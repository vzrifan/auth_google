<?php

include "conn.php";

if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM data_dasar WHERE id=$id";
$query = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

if (isset($_SESSION['google_data'])) {
    $goTo = "account.php";
} else {
    $goTo = "dashboard.php";
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Edit</title>
    <style>
        body{
            font-family: "Courier", sans-serif;
            background: linear-gradient(90deg, rgb(0, 228, 100)0% 25%,rgb(255, 200, 100),  rgb(0, 228, 100) 75% 100%);
            color: rgb(255, 0, 0);
        }
    </style>
</head>

<body>
    <header>
        <h3>Edit Form</h3>
    </header>

    <form action="proses-edit.php" method="POST">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $siswa['ID'] ?>" />

            <p>
                <label for="nim">Nim: </label>
                <input type="text" name="nim" placeholder="NIM" value="<?php echo $siswa['NIM'] ?>" />
            </p>
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $siswa['NAMA'] ?>" />
            </p>
            <p>
                <label for="semester">Semester: </label>
                <input type="text" name="semester" placeholder="Semester" value="<?php echo $siswa['SEMESTER'] ?>" />
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"><?php echo $siswa['ALAMAT'] ?></textarea>
            </p>
            <p>
                <label for="no_telp">No Telepon: </label>
                <input type="text" name="no_telp" placeholder="No Telepeon" value="<?php echo $siswa['NO_TELP'] ?>" />
            </p>
            <p>
                <label for="prodi">Prodi: </label>
                <input type="text" name="prodi" value="<?php echo $siswa['PRODI'] ?>" placeholder="Prodi" />
            </p>
            <p>
                <label for="fakultas">Fakultas: </label>
                <input type="text" name="fakultas" value="<?php echo $siswa['FAKULTAS'] ?>" placeholder="Fakultas"/>
            </p>
            <p>
                <label for="tahun_masuk">Tahun Masuk: </label>
                <input type="text" name="tahun_masuk" value="<?php echo $siswa['TAHUNMASUK'] ?>" placeholder="Tahun Masuk"/>
            </p>
            <p>
                <label for="ukt">UKT: </label>
                <input type="text" name="ukt" value="<?php echo $siswa['UKT'] ?>" placeholder="UKT"/>
            </p>
            <p>
                <label for="status_ukt">Status UKT: </label>
                <input type="text" name="status_ukt" value="<?php echo $siswa['STATUSUKT'] ?>" placeholder="Status UKT"/>
            </p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <?php $jk = $siswa['GENDER']; ?>
                <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan</label>
            </p>
            <p>
                <label for="password">Password: </label>
                <input type="text" name="password" placeholder="Password" value="<?php echo $siswa['PASSWORD'] ?>" />
            </p>
            <p>
                <label for="plat_nomor">Plat Nomor: </label>
                <input type="text" name="plat_nomor" placeholder="Plat Nomor" value="<?php echo $siswa['PLATNOMOR'] ?>" />
            </p>
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p>

        </fieldset>


    </form>

</body>

</html>