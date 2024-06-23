<?php
require 'functions.php';
$id = $_GET['id'];
if (delDokter($id) > 0) {
    echo "<script>alert('Hapus data berhasil');
    document.location.href= 'dokter.php';
    </script>";
} else {
    echo "<script>
    alert('Hapus data gagal');
    document.location.href= 'dokter.php';
    </script>";
}
