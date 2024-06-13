<?php
require 'function.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM category
            WHERE 
            name LIKE '%$keyword%' OR
            description LIKE '%$keyword%'
            ";
$category = query($query);
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
                <tr>
                    <th scope="col" width="30">#</th>
                    <th scope="col">name</th>
                    <th scope="col">category</th>
                    <th scope="col">description</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php if (!empty($category)) : ?>
                    <?php foreach ($category as $c) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $c["name"] ?></td>
                            <td><?= $c["description"] ?></td>
                            <td>
                                <a href="ubah-kategori.php?id=<?= $c["id"]; ?>">ubah</a> |
                                <a href="admin2.php?hapus=<?= $c["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>

                            </td>
                        </tr>
                    <?php
                        $i++;
                    endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">No category found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
</body>