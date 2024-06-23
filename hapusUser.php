<?php
require 'functions.php';
$id = $_GET['id'];
if (delUser($id) > 0) {
    echo "<script>alert('Hapus data berhasil');
    document.location.href= 'user.php';
    </script>";
} else {

    echo "<script>
    alert('Hapus data gagal');
    document.location.href= 'user.php';
    </script>";
}
