<?php
include "conn.php";

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM data_dasar WHERE id=$id";
$query = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

include_once("config.php");

if (isset($_SESSION['google_data'])) {
    $goTo = "account.php";
} else {
    $goTo = "dashboard.php";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Read</title>
    <style>
        body {
            font-family: "Courier", sans-serif;
            background: linear-gradient(90deg, rgb(0, 228, 100)0% 25%, rgb(255, 200, 100), rgb(0, 228, 100) 75% 100%);
            color: rgb(255, 0, 0);
        }

        input {
            background-color: rgb(189, 72, 89);
        }
    </style>
</head>

<body>
    <header>
        <h3>Read Form</h3>
    </header>

    <form action="<?php echo $goTo ?>" method="POST">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $siswa['ID'] ?>" />

            <p>
                <label for="nim">Nim: </label>
                <?php echo $siswa['NIM'] ?>
            </p>
            <p>
                <label for="nama">Nama: </label>
                <?php echo $siswa['NAMA'] ?>
            </p>
            <p>
                <label for="semester">Semester: </label>
                <?php echo $siswa['SEMESTER'] ?>
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <?php echo $siswa['ALAMAT'] ?>
            </p>
            <p>
                <label for="no_telp">No Telepon: </label>
                <?php echo $siswa['NO_TELP'] ?>
            </p>
            <p>
                <label for="prodi">Prodi: </label>
                <?php echo $siswa['PRODI'] ?>
            </p>
            <p>
                <label for="fakultas">Fakultas: </label>
                <?php echo $siswa['FAKULTAS'] ?>
            </p>
            <p>
                <label for="tahun_masuk">Tahun Masuk: </label>
                <?php echo $siswa['TAHUNMASUK'] ?>
            </p>
            <p>
                <label for="ukt">UKT: </label>
                <?php echo $siswa['UKT'] ?>
            </p>
            <p>
                <label for="status_ukt">Status UKT: </label>
                <?php echo $siswa['STATUSUKT'] ?>
            </p>
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <?php $jk = $siswa['GENDER']; ?>
                <?php echo ($jk == 'laki-laki') ? "Laki-laki" : "Perempuan" ?>
            </p>
            <p>
                <label for="password">Password: </label>
                <?php echo $siswa['PASSWORD'] ?>
            </p>
            <p>
                <label for="plat_nomor">Plat Nomor: </label>
                <?php echo $siswa['PLATNOMOR'] ?>
            </p>
            <p>
                <input type="submit" value="Kembali" name="simpan" />
            </p>

        </fieldset>

    </form>

</body>

</html>