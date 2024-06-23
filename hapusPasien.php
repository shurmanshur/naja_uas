<?php
require 'functions.php';
$id = $_GET['id'];
if (delPasien($id) > 0) {
    echo "<script>alert('Hapus data berhasil');
    document.location.href= 'pasien.php';; 
    </script>";
} else {

    echo "<script>
    alert('Hapus data gagal');
    document.location.href= 'pasien.php';; 
    </script>";
}
