<?php
require 'functions.php';

$id = $_GET['id'];
$data = query("SELECT * FROM periksa WHERE id = $id");
$dataObat = query("SELECT detail_periksa.*, obat.nama_obat, obat.kemasan FROM detail_periksa INNER JOIN obat ON obat.id=detail_periksa.id_obat WHERE detail_periksa.id_periksa = $id");

if (isset($_POST["addDaftarPerika"])) {
    if (addDetailPeriksa($_POST) > 0) {
        echo "<script>alert('Data obat ditambah');
        document.location.href= 'addDetailPeriksa.php?id=$id';
        </script> ";
    } else {
        echo "<script>alert('Data obat gagal ditambah');
        document.location.href= 'addDetailPeriksa.php?id=$id';
        </script> ";
    }
}
$dokterData = query("SELECT * FROM dokter");
$pasienData = query("SELECT * FROM pasien");
$obatData = query("SELECT * FROM obat");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Detail Periksa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tambah Detail Periksa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </nav>
    <div class="container p-5 m-5">
        <h1>Tambah Detail Periksa</h1>
        <?php foreach ($data as $d) : ?>
        <!-- <form action="" method="post"> -->
        <div class="mb-3">
        <label for="selectPasien" class="form-label">Pasien</label>
        <select readonly id="selectPasien" class="form-select" name="id_pasien">
            <?php foreach ($pasienData as $m) :?>
            <option <?php if($m['id'] == $d['id_pasien']):?> selected <?php endif;?> value="<?= $m['id']?>"><?= $m['nama']?> - <?= $m['alamat']?></option>
            <?php endforeach;?>
        </select>
        </div>
        <div class="mb-3">
        <label for="selectDokter" class="form-label">Dokter</label>
        <select readonly id="selectDokter" class="form-select" name="id_dokter">
            <?php foreach ($dokterData as $m) :?>
            <option <?php if($m['id'] == $d['id_dokter']):?> selected <?php endif;?>  value="<?= $m['id']?>"><?= $m['nama']?> - <?= $m['alamat']?></option>
            <?php endforeach;?>
        </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal Periksa</label>
            <input readonly type="date" class="form-control" id="exampleInputEmail1" name="tgl_periksa" value="<?=$d['tgl_periksa']?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Catatan</label>
            <input readonly type="text" class="form-control" id="exampleInputPassword1" name="catatan" value="<?=$d['catatan']?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Obat</label>
            <div class="row">
                <div class="col-10">
                <div class="card">
                    <span>
                        <?php foreach($dataObat as $do):?>
                        <button href="" class="btn btn-primary badge"> <?= $do['nama_obat']?> <a href="hapusDetailPeriksa.php?id=<?= $do['id']?>&id_periksa=<?= $do['id_periksa']?>" class="text-white" style="text-decoration:none"> | x </a></button>
                        <?php endforeach;?>
                    </span>
                </div>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Obat
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <input type="hidden" class="form-control" name="id_periksa" value="<?=$d['id']?>">
                            <select id="selectObat" class="form-select mb-3" name="id_obat">
                                <?php foreach ($obatData as $m) :?>
                                <option value="<?= $m['id']?>"><?= $m['nama_obat']?> - <?= $m['kemasan']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addDaftarPerika">Save changes</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="periksa.php" class="btn btn-primary">Kembali</a>
        </form>
        <?php endforeach; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>