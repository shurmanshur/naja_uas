<?php
require 'functions.php';
$id = $_GET['id'];
$id_periksa = $_GET['id_periksa'];
if (delDetailPeriksa($id) > 0) {
    echo "<script>alert('Hapus data obat berhasil');
    document.location.href= 'addDetailPeriksa.php?id=$id_periksa';
    </script>";
} else {

    echo "<script>
    alert('Hapus data obat gagal');
    document.location.href= 'addDetailPeriksa.php?id=$id_periksa';
    </script>";
}
