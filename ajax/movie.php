<?php
require 'function.php';
$keyword = $_GET["keyword"];
$query = "SELECT movies.*, category.name AS category_name FROM movies JOIN category ON movies.category_id = category.id;
            WHERE
            gambar LIKE '%$keyword%' OR
            name LIKE '%$keyword%' OR
            category_name LIKE '%$keyword%' OR
            language LIKE '%$keyword%' OR
            year LIKE '%$keyword%' OR
            hour LIKE '%$keyword%' OR
            Rating LIKE '%$keyword%' OR
            Quality LIKE '%$keyword%'
";
$movie = query($query);
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feelmovie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style3.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
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
 </body>