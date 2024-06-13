<?php


session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}


require 'function.php';

$id = htmlspecialchars($_GET['id']);

if (hapus($id) > 0) {
    echo "<script>
        alert('Data Berhasil dihapus!');
        document.location.href='admin.php';
        </script>";
} else {
    mysql_error($id);
}