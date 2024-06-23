<?php
require 'functions.php';
$id = $_GET['id'];
if (delObat($id) > 0) {
    echo "<script>alert('Hapus data berhasil');
    document.location.href= 'obat.php';
    </script>";
} else {

    echo "<script>
    alert('Hapus data gagal');
    document.location.href= 'obat.php';
    </script>";
}
