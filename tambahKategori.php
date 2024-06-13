<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}


require('./function.php');

if (isset($_POST['tambah'])) {
    $result = tambahKategori($_POST['nama_kategori'], $_POST['deskripsi_kategori']);

    if ($result) {
        echo "
        <script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'admin2.php';
		</script>
		"; 
    } else {
        echo "
        <script>
			alert('data tidak berhasil ditambahkan!');
			document.location.href = 'admin2.php';
		</script>
		";
    }
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
</head>

<body class="bg-main">

    <!-- Add -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="card col-sm-10 col-md-8">
                <div class="card-body">
                    <h4 class="card-title text-center">Add Category</h4>
                    <form action="" method="POST">
                        <div class="mb-2">
                            <label for="nama_kategori" class="col-form-label">Category Name</label>
                            <input type="text" name="nama_kategori" class="form-control" placeholder="Romantic" required autofocus>
                        </div>
                        <div class="mb-2">
                            <label for="deskripsi_kategori" class="col-form-label">Category Description</label>
                            <textarea name="deskripsi_kategori" class="form-control" placeholder="Add description here" required></textarea>
                        </div>
                        <!-- Add & Back -->
                        <button type="submit" name="tambah" class="btn btn-primary">Add</button>
                        <a href="admin2.php" class="mx-3 link-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>