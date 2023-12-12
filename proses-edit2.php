<?php

include "koneksi.php";

$goTo = "table/admin_akun.php";


if (isset($_POST['simpan'])) {

    // ambil data dari formulir
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "UPDATE users2 SET password = '$password' WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: $goTo");
    } else {
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
