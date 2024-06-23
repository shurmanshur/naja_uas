<?php
require 'functions.php';

$id = $_GET['id'];
$data = query("SELECT * FROM obat WHERE id = $id");

if (isset($_POST["editButton"])) {
    if (updateObat($_POST) > 0) {
        echo "<script>alert('Data update');
        document.location.href= 'obat.php';
        </script> ";
    } else {

        echo "<script>alert('Data gagal update');
        document.location.href= 'obat.php';
        </script> ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Edit Obat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </nav>
    <div class="container p-5 m-5">
        <h1>Edit Obat</h1>
        <?php foreach ($data as $m) : ?>
        <form action="" method="post">
        <div class="mb-3">
            <input type="hidden" class="form-control" id="exampleInputEmail1" name="id" value="<?= $m['id'] ?>">
            <label for="exampleInputEmail1" class="form-label">Nama Obat</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_obat" value="<?= $m['nama_obat'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Kemasan</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="kemasan" value="<?= $m['kemasan'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Harga</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="harga" value="<?= $m['harga'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="editButton">Update</button>
        </form>
        <?php endforeach; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>