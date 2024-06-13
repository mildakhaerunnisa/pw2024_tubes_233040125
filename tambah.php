<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

require('./function.php');

// Mendapatkan daftar kategori
$categories = query("SELECT * FROM category");

if (isset($_POST['tambah'])) {
  $result = tambah($_POST);

  if ($result) {
    echo "
    <script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'admin.php';
		</script>
		";
  } else {
    echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'admin.php';
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
  <title>Filmovie - Add Movie</title>
</head>

<body class="bg-main">

  <!-- Add -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="card col-sm-10 col-md-8">
        <div class="card-body">
          <h4 class="card-title text-center">Add Movie</h4>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-2">
              <label for="name" class="col-form-label">Movie Title</label>
              <input type="text" name="name" class="form-control" placeholder="Wednesday" required autofocus>
            </div>
            <div class="mb-2">
              <label for="language" class="col-form-label">Language</label>
              <input type="text" name="language" class="form-control" placeholder="English" required>
            </div>
            <div class="mb-2">
              <label for="hour" class="col-form-label">Hour</label>
              <input type="text" name="hour" class="form-control" placeholder="2h or 3h" required>
            </div>
            <div class="mb-2">
              <label for="year" class="col-form-label">Year</label>
              <input type="text" name="year" class="form-control" placeholder="2023" required>
            </div>
            <div class="mb-2">
              <label for="storyline" class="col-form-label">Movie Description</label>
              <textarea name="storyline" class="form-control" placeholder="Make it short and sweet" required></textarea>
            </div>
            <div class="mb-2">
              <label for="Rating" class="col-form-label">Rating</label>
              <textarea name="Rating" class="form-control" placeholder="8,5" required></textarea>
            </div>
            <div class="mb-2">
              <label for="Quality" class="col-form-label">Quality</label>
              <textarea name="Quality" class="form-control" placeholder="4K, HD" required></textarea>
            </div>
            <div class="mb-2">
              <label for="gambar" class="col-form-label">Images</label>
              <input type="file" name="gambar" class="form-control picture" placeholder="Select picture here" onchange="previewImage()">
              <img src="../images/blank.png" width="150" class="mt-3 d-block img-preview">
            </div>
            <div class="mb-3">
              <label for="category" class="col-form-label">Category</label>
              <select class="form-select" name="category" required>
                <option disabled selected>Select the Category</option>
                <?php foreach ($categories as $category) : ?>
                  <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <!-- Add & Back -->
            <button type="submit" name="tambah" class="btn btn-primary">Add</button>
            <a href="admin.php" class="mx-3 link-secondary">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <script src="assets/js/admin.js"></script>
</body>

</html>