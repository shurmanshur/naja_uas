<?php
require 'functions.php';

$id = $_GET['id'];
$data = query("SELECT periksa.*, dokter.nama as dokter_nama, dokter.alamat as dokter_alamat, dokter.no_hp as dokter_no_hp, pasien.nama as pasien_nama, pasien.alamat as pasien_alamat, pasien.no_hp as pasien_no_hp FROM periksa INNER JOIN dokter ON dokter.id=periksa.id_dokter INNER JOIN pasien ON pasien.id=periksa.id_pasien WHERE periksa.id = $id");
$dataObat = query("SELECT detail_periksa.*, obat.nama_obat, obat.kemasan, obat.harga FROM detail_periksa INNER JOIN obat ON obat.id=detail_periksa.id_obat WHERE detail_periksa.id_periksa = $id");

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
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Invoice</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </nav>
    <?php foreach($data as $p):?>
        <div class="container p-5 m-5">
        <h1>Invoice</h1>
        <div class="card mx-auto" style="width: 50rem;">
            <div class="card-header text-center">
                Invoice
            </div>
            <div class="card-body">
                <h5 class="card-title mb-5 text-center"><b>Nota Pembayaran</b></h5>
                <div class="row text-center">
                    <div class="col-6">
                        <p class="card-text">Nomor Periksa</p>
                        <p class="card-text"><b>#<?=$p['id']?></b></p>
                    </div>
                    <div class="col-6">
                        <p class="card-text">Tanggal Periksa</p>
                        <p class="card-text"><?=$p['tgl_periksa']?></p>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-6">
                        <p class="card-text">Pasien<br>
                            <b><?=$p['pasien_nama']?></b><br>
                            <?=$p['pasien_alamat']?><br>
                            <?=$p['pasien_no_hp']?></p>
                    </div>
                    <div class="col-6">
                        <p class="card-text">Dokter<br>
                            <b><?=$p['dokter_nama']?></b><br>
                            <?=$p['dokter_alamat']?><br>
                            <?=$p['dokter_no_hp']?></p>
                    </div>
                </div>
                <hr>
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Deskripsi</th>
                    <th scope="col" class="text-end">Harga</th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                    <td>Jasa Dokter</td>
                    <td class="text-end">150.000</td>
                    </tr>
                    <?php 
                    $totalObat = 0;
                    foreach($dataObat as $do):?>
                    <tr>
                    <td><?=$do['nama_obat'] . $do['kemasan']?></td>
                    <td class="text-end"> <?= number_format($do['harga'], 0,',','.')?></td>
                    </tr>
                    <?php 
                    $totalObat+=$do['harga'];
                    endforeach; ?>
                </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4 text-end">
                        <p class="card-text">Jasa Dokter Rp 150.000,00 <br>
                        Subtotal Obat Rp <?=number_format( $totalObat, 0, ',', '.')?>,00<br>
                        <b>Total Rp <?=number_format( ($totalObat+150000), 0, ',', '.')?>,00</b></p>
                    </div>
                </div>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
            <div class="card-footer text-center">
                Terimakasih
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>