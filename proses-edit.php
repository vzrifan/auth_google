<?php

include "conn.php";
include_once "config.php";

if (isset($_SESSION['google_data'])) {
    $goTo = "account.php";
} else {
    $goTo = "dashboard.php";
}

if (isset($_POST['simpan'])) {

    // ambil data dari formulir
    $id = $_POST["id"];
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $semester = $_POST["semester"];
    $alamat = $_POST["alamat"];
    $notelp = $_POST["no_telp"];
    $prodi = $_POST["prodi"];
    $fakultas = $_POST["fakultas"];
    $tahun_masuk = $_POST["tahun_masuk"];
    $ukt = $_POST["ukt"];
    $status_ukt = $_POST["status_ukt"];
    $gender = $_POST["jenis_kelamin"];
    $password = $_POST["password"];
    $plat_nomor = $_POST["plat_nomor"];

    $sql = "UPDATE data_dasar 
        SET NIM = '$nim', NAMA = '$nama', SEMESTER = '$semester', ALAMAT = '$alamat', NO_TELP = '$notelp', PRODI = '$prodi', FAKULTAS = '$fakultas', TAHUNMASUK = '$tahun_masuk', UKT = '$ukt', STATUSUKT = '$status_ukt', GENDER = '$gender', PASSWORD = '$password', PLATNOMOR = '$plat_nomor' 
        WHERE ID = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: $goTo");
    } else {
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
