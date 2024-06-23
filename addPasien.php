<?php
require 'functions.php';

if (isset($_POST["addButton"])) {
    if (addPasien($_POST) > 0) {
        echo "<script>alert('Data ditambah');
        document.location.href= 'pasien.php';
        </script> ";
    } else {

        echo "<script>alert('Data gagal ditambah');
        document.location.href= 'pasien.php';
        </script> ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tambah Pasien</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </nav>
    <div class="container p-5 m-5">
        <h1>Tambah Pasien</h1>
        <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nama">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="alamat">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">No Hp</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="no_hp">
        </div>
        <button type="submit" class="btn btn-primary" name="addButton">Tambah</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>