<?php
require 'functions.php';
$id = $_GET['id'];
if (delPeriksa($id) > 0) {
    echo "<script>alert('Hapus data berhasil');
    document.location.href= 'periksa.php';
    </script>";
} else {

    echo "<script>
    alert('Hapus data gagal');
    document.location.href= 'periksa.php';
    </script>";
}
