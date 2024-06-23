<?php
$conn = mysqli_connect("localhost", "root", "root", "naja_uts");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($post)
{
    global $conn;
    $username = $post['username'];
    $password_confirmation = $post['password_confirmation'];
    $password = $post['password'];
    if($password_confirmation != $password){
        echo "<script>alert('Konfirmasi Password tidak sesuai')
        document.location.href = 'register.php';
        </script>";
        return false;
    }

    $passwordhash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO user (username, password)  VALUES ('$username','$passwordhash')";
    mysqli_query($conn, $query);
    $result = mysqli_affected_rows($conn);
    if ($result == 0) {
        echo mysqli_error_list($conn);
    }
    return $result;
}

function login($post)
{
    $username = $post['username'];
    $password = $post['password'];
    $passSaved = '';

    $data = query("SELECT * FROM user WHERE username = '$username'");
    if ($data == []) {
        echo "<script>alert('Identitas belum terdaftar!')
        document.location.href = 'login.php';
        </script>";
        return false;
    }

    foreach ($data as $m) {
        $passSaved = $m['password'];
    }

    if (!password_verify($password, $passSaved)) {
        echo "<script>alert('Password Salah !')
        document.location.href = 'login.php';
        </script>";
        return false;
    }

    return true;
}

function addPasien($post)
{
    global $conn;
    $nama = $post['nama'];
    $alamat = $post['alamat'];
    $no_hp = $post['no_hp'];

    $query = "INSERT INTO pasien (nama, alamat, no_hp) VALUES ('$nama','$alamat', '$no_hp')";
    mysqli_query($conn, $query);
    $result = mysqli_affected_rows($conn);
    if ($result == 0) {
        echo mysqli_error_list($conn);
    }
    return $result;
}

function addDokter($post)
{
    global $conn;
    $nama = $post['nama'];
    $alamat = $post['alamat'];
    $no_hp = $post['no_hp'];

    $query = "INSERT INTO dokter (nama, alamat, no_hp) VALUES ('$nama','$alamat', '$no_hp')";
    mysqli_query($conn, $query);
    $result = mysqli_affected_rows($conn);
    if ($result == 0) {
        echo mysqli_error_list($conn);
    }
    return $result;
}

function addPeriksa($post)
{
    global $conn;
    $id_dokter = $post['id_dokter'];
    $id_pasien = $post['id_pasien'];
    $tgl_periksa = $post['tgl_periksa'];
    $catatan = $post['catatan'];

    $query = "INSERT INTO periksa (id_dokter, id_pasien, tgl_periksa, catatan) VALUES ($id_dokter, $id_pasien, '$tgl_periksa','$catatan')";
    mysqli_query($conn, $query);
    $result = mysqli_affected_rows($conn);
    if ($result == 0) {
        echo mysqli_error_list($conn);
    }
    return $result;
}

function addObat($post)
{
    global $conn;
    $nama_obat = $post['nama_obat'];
    $kemasan = $post['kemasan'];
    $harga = $post['harga'];

    $query = "INSERT INTO obat (nama_obat, kemasan, harga) VALUES ('$nama_obat','$kemasan', $harga)";
    mysqli_query($conn, $query);
    $result = mysqli_affected_rows($conn);
    if ($result == 0) {
        echo mysqli_error_list($conn);
    }
    return $result;
}

function addDetailPeriksa($post)
{
    global $conn;
    $id_obat = $post['id_obat'];
    $id_periksa = $post['id_periksa'];

    $query = "INSERT INTO detail_periksa (id_periksa, id_obat) VALUES ($id_periksa, $id_obat)";
    mysqli_query($conn, $query);
    $result = mysqli_affected_rows($conn);
    if ($result == 0) {
        echo mysqli_error_list($conn);
    }
    return $result;
}

function delUser($id)
{
    global $conn;
    $query = "DELETE FROM user WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delPasien($id)
{
    global $conn;
    $query = "DELETE FROM pasien WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delDokter($id)
{
    global $conn;
    $query = "DELETE FROM dokter WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delPeriksa($id)
{
    global $conn;
    $query = "DELETE FROM periksa WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delObat($id)
{
    global $conn;
    $query = "DELETE FROM obat WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delDetailPeriksa($id)
{
    global $conn;
    $query = "DELETE FROM detail_periksa WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateDokter($post)
{
    global $conn;
    $id = $post['id'];
    $nama = $post['nama'];
    $alamat = $post['alamat'];
    $no_hp = $post['no_hp'];

    $query = "UPDATE dokter SET nama = '$nama', alamat = '$alamat', no_hp = '$no_hp' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updatePasien($post)
{
    global $conn;
    $id = $post['id'];
    $nama = $post['nama'];
    $alamat = $post['alamat'];
    $no_hp = $post['no_hp'];

    $query = "UPDATE pasien SET nama = '$nama', alamat = '$alamat', no_hp = '$no_hp' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateUser($post)
{
    global $conn;
    $id = $post['id'];
    $username = $post['username'];
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE user SET username = '$username', password = '$password' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updatePeriksa($post)
{
    global $conn;
    $id = $post['id'];
    $id_dokter = $post['id_dokter'];
    $id_pasien = $post['id_pasien'];
    $tgl_periksa = $post['tgl_periksa'];
    $catatan = $post['catatan'];

    $query = "UPDATE periksa SET id_dokter = $id_dokter, id_pasien = $id_pasien, tgl_periksa = '$tgl_periksa', catatan = '$catatan' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateObat($post)
{
    global $conn;
    $id = $post['id'];
    $nama_obat = $post['nama_obat'];
    $kemasan = $post['kemasan'];
    $harga = $post['harga'];

    $query = "UPDATE obat SET nama_obat = '$nama_obat', kemasan = '$kemasan', harga = $harga WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function addData($post)
{
    global $conn;
    $nim = $post['nim'];
    $nama = $post['nama'];
    $katasandi = password_hash($post['password'], PASSWORD_DEFAULT);
    $email = $post['email'];
    $mobileNumber = $post['mobile_number'];
    $photo = upload();
    if (!$photo) {
        echo "<script>alert('Data upload gagal !')</script>";
        return false;
    }
    $query = "INSERT INTO mhs (nim, nama, password, email, mobile_number, photo)  VALUES ('$nim','$nama', '$katasandi','$email', '$mobileNumber', '$photo')";
    mysqli_query($conn, $query);
    $result = mysqli_affected_rows($conn);
    if ($result == 0) {
        echo mysqli_error_list($conn);
    }
    return $result;
}

function upload()
{
    global $conn;
    $name = $_FILES['photo']['name'];
    $size = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    if ($error == 4) {
        echo "<scripta>alert('Data upload kosong !')</script>";
        return false;
    }
    if ($size > 500000) {
        echo "<scripta>alert('Data upload terlalu besar !')</script>";
        return false;
    }
    move_uploaded_file($tmp_name, 'assets/mhs/' . $name);
    return $name;
}

function delData($id)
{
    global $conn;
    $query = "DELETE FROM mhs WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateData($post)
{
    global $conn;
    $id = $post['id'];
    $nim = $post['nim'];
    $nama = $post['nama'];
    $email = $post['email'];
    $mobileNumber = $post['mobile_number'];
    $photo = '';
    $katasandi = '';

    if ($_FILES['photo']['error'] == 4) {
        $photo = $post['old_photo'];
    } else {
        $photo = upload();
        if (!$photo) {
            echo "<script>alert('Data upload gagal !')</script>";
            return false;
        }
    }

    //cek password
    if ($post['password'] == null) {
        $katasandi = $post['old_password'];
    } else {
        $katasandi = password_hash($post['password'], PASSWORD_DEFAULT);
    }


    $query = "UPDATE mhs SET nim = '$nim', nama = '$nama', password = '$katasandi', mobile_number = '$mobileNumber', email = '$email', photo = '$photo' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function dologin($post)
{
    $nim = $post['nim'];
    $password = $post['password'];
    $passSaved = '';

    $data = query("SELECT * FROM mhs WHERE nim = '$nim'");
    if ($data == []) {
        echo "<script>alert('Identitas belum terdaftar!')
        document.location.href = 'login.php';
        </script>";
        return false;
    }

    foreach ($data as $m) {
        $passSaved = $m['password'];
    }

    if (!password_verify($password, $passSaved)) {
        echo "<script>alert('Password Salah !')
        document.location.href = 'login.php';
        </script>";
        return false;
    }

    return true;
}
