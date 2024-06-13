<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

require('./function.php');

// Mengambil data kategori dari database
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

// Mendapatkan daftar kategori
$categories = query("SELECT * FROM category");

// Memeriksa apakah query berhasil dieksekusi
if ($result === false) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Mengubah data hasil query menjadi array asosiatif
$categories = $result->fetch_all(MYSQLI_ASSOC);

// Mendapatkan ID kategori yang akan diubah dari URL
$categoryId = $_GET['id'];

// Mendapatkan data kategori berdasarkan ID
$categoryQuery = "SELECT * FROM category WHERE id = ?";
$stmt = $conn->prepare($categoryQuery);
$stmt->bind_param("i", $categoryId);
$stmt->execute();
$categoryResult = $stmt->get_result();

// Memeriksa apakah query berhasil dieksekusi
if (!$categoryResult) {
    echo "Error: " . $categoryQuery . "<br>" . $conn->error;
}

// Mendapatkan data kategori sebagai array asosiatif
$category = $categoryResult->fetch_assoc();

// Mengubah kategori
if (isset($_POST['update'])) {
    $newName = $_POST['name'];
    $newDescription = $_POST['description'];
    $success = updateCategory($categoryId, $newName, $newDescription);
}

// Mengupdate kategori
function updateCategory($categoryId, $newName, $newDescription)
{
    global $conn;

    try {
        // Mengupdate data kategori
        $updateQuery = "UPDATE category SET name = ?, description = ? WHERE id = ?";

        // Menggunakan prepared statement untuk mencegah SQL injection
        $stmt = $conn->prepare($updateQuery);
        if (!$stmt) {
            throw new Exception("Error: " . $conn->error);
        }

        $stmt->bind_param("ssi", $newName, $newDescription, $categoryId);
        $stmt->execute();

        return true;
    } catch (Exception $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
    return false;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style3.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Feelmovie</title>
    <script>
        // Script JavaScript untuk menampilkan alert popup
        <?php if (isset($success) && $success) : ?>
            window.onload = function() {
                alert("Kategori berhasil diupdate.");
                window.location.href = "admin2.php";
            };
        <?php endif; ?>
    </script>
</head>

<body class="bg-main">

    <!-- Edit -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="card col-sm-10 col-md-8">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Category</h4>
                    <form action="" method="POST">
                        <div class="mb-2">
                            <label for="name" class="col-form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="<?= $category['name']; ?>" required autofocus>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="col-form-label">Description</label>
                            <textarea name="description" class="form-control" placeholder="Add description here" required><?= $category['description']; ?></textarea>
                        </div>
                        <!-- Add & Back -->
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <a href="admin2.php" class="mx-3 link-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>