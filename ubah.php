<?php
require('./function.php');

$id = $_GET["id"];
// Mendapatkan data film berdasarkan ID
$film = query("SELECT * FROM movies WHERE id = $id")[0];

// Mendapatkan daftar kategori
$categories = query("SELECT * FROM category");

if (isset($_POST['ubah'])) {
  $result = ubah($_POST);

  if ($result) {
    echo "<script>
        alert('Data Berhasil diubah!');
        document.location.href='admin.php';
        </script>";
  } else {
    echo "<script>
        alert('Data belum berhasil diubah!');
        document.location.href='admin.php';
        </script>";

    var_dump($result);
    die;
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

  <!-- Edit -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="card col-sm-10 col-md-8">
        <div class="card-body">
          <h4 class="card-title text-center">Edit Movie</h4>
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $film['id']; ?>">
            <input type="hidden" name="gambarlama" value="<?= $film["gambar"]; ?>">
            <div class="mb-2">
              <label for="name" class="col-form-label">Movie Title</label>
              <input type="text" name="name" class="form-control" placeholder="Wednesday" required autofocus value="<?= $film['name']; ?>">
            </div>
            <div class="mb-2">
              <label for="language" class="col-form-label">Language</label>
              <input type="text" name="language" class="form-control" placeholder="English" required value="<?= $film['language']; ?>">
            </div>
            <div class="mb-2">
              <label for="hour" class="col-form-label">Hour</label>
              <input type="text" name="hour" class="form-control" placeholder="2h or 3h" required value="<?= $film['hour']; ?>">
            </div>
            <div class="mb-2">
              <label for="year" class="col-form-label">Year</label>
              <input type="text" name="year" class="form-control" placeholder="2023" required value="<?= $film['year']; ?>">
            </div>
            <div class="mb-2">
              <label for="storyline" class="col-form-label">Movie Description</label>
              <textarea name="storyline" class="form-control" placeholder="Make it short and sweet" required><?= $film['storyline']; ?></textarea>
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
              <label for="gambar" class="col-form-label">Gambar</label>
              <input type="file" name="gambar" class="form-control gambar" placeholder="Pilih gambar di sini" onchange="previewImage()">
              <img src="../tubes/assets/images/<?= $film["gambar"]; ?>" style=" display:block; align-items: center;" class="img-preview w-50">

            </div>
            <div class="mb-3">
              <label for="category" class="col-form-label">Category</label>
              <select class="form-select" name="category" required>
                <option>Select the Category</option>
                <?php foreach ($categories as $category) : ?>
                  <option value="<?= $category['id']; ?>" <?php if ($category['id'] == $film['category_id']) echo "selected"; ?>>
                    <?= $category['name']; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <!-- Edit & Back -->
            <button type="submit" name="ubah" class="btn btn-primary">Edit</button>
            <a href="admin.php" class="mx-3 link-secondary">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script>
    function previewImage() {
      const picture = document.querySelector(".gambar");
      const imgPreview = document.querySelector(".img-preview");

      const oFReader = new FileReader();
      oFReader.readAsDataURL(picture.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      };
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- <script src="./assets/js/admin.js"></script> -->
</body>

</html>