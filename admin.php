<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("location: login.php");
  exit;
}

require 'function.php';

// Ambil data dari tabel movies
$query = "SELECT movies.*, category.name AS category_name FROM movies JOIN category ON movies.category_id = category.id";
$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);




?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feelmovie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style3.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark mx-auto">
    <div class="container">
      <a href="admin.php" class="fw-bold fst-italic align-middle navbar-brand">Feelmovie</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <a href="index.php" class="nav-item nav-link page-scroll">
            <button type="button" class="btn btn-2"><i class="bi bi bi-people-fill"></i> User Page</button>
          </a>
          <a href="admin2.php" class="nav-item nav-link page-scroll">
            <button type="button" class="btn btn-2"><i class="bi bi bi-people-fill"></i> Category</button>
          </a>
          <a href="logout.php" class="nav-item nav-link page-scroll">
            <button type="button" class="btn btn-1"><i class="bi bi-box-arrow-right"></i> Logout</button>
          </a>
        </ul>
      </div>
    </div>
    
  </nav>

  <!-- admin -->
  <section id="admin" class="my-5 container justify-content-center">
    <h1 class="text-center display-8 fw-bold mb-3">Feelmovie Database</h1>

    <!-- Action Bar -->
    <form action="" method="POST" class="mb-3">
      <!-- Searching -->
      <input type="text" name="keyword_movie" id="keyword_movie"size="30" placeholder="Search" autocomplete="off" id="keyword"autofocus>
      <button type="submit" name="cari" id="tombol-cari_movie"class="btn btn-secondary">Search</button>
      <!-- add -->
      <a href="tambah.php" class="btn btn-primary float-sm-end"><i class="bi bi-plus-circle"></i> Add Movie</a>
    </form>

    <!-- tabel database -->
     <div id="container">
      <table class="table table-sm align-middle table-bordered table-striped table-hover text-center">
      <thead>
        <th scope="col" width="30">#</th>
        <th scope="col">images</th>
        <th scope="col">name</th>
        <th scope="col">category</th>
        <th scope="col">language</th>
        <th scope="col">year</th>
        <th scope="col">hour</th>
        <th scope="col">rating</th>
        <th scope="col">quality</th>
        <th scope="col">action</th>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($movies as $movie) : ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><img src="assets/images/<?= $movie["gambar"]; ?>" alt="foto" style="width: 150px;"></td>
            <td><?= $movie["name"] ?></td>
            <td><?= $movie["category_name"] ?></td>
            <td><?= $movie["language"] ?></td>
            <td><?= $movie["year"] ?></td>
            <td><?= $movie["hour"] ?></td>
            <td><?= $movie["Rating"] ?></td>
            <td><?= $movie["Quality"] ?></td>
            <td> <a href="ubah.php?id=<?= $movie["id"]; ?>">ubah</a> |
              <a href="hapus.php?id=<?= $movie["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
            </td>
          </tr>
        <?php
          $i++;
        endforeach ?>
      </tbody>
    </table>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src=".assets/js/jquery-3.7.0.min.js"></script>
  <script src="./assets/js/script.js"></script>
</body>

</html>

<body>