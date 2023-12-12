<?php
include "koneksi.php";

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: table/admin_akun.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM users WHERE id=$id";
$query = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

$goTo = "table/admin_akun.php"
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

        .simpan:hover{
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h3>Read Form</h3>
    </header>

    <form action="<?php echo $goTo ?>" method="POST">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <p>
                <label for="id">Id: </label>
                <?php echo $siswa['id'] ?>
            </p>
            <p>
                <label for="nama depan">Nama Depan: </label>
                <?php echo $siswa['fname'] ?>
            </p>
            <p>
                <label for="nama belakang">Nama Belakang: </label>
                <?php echo $siswa['lname'] ?>
            </p>
            <p>
                <label for="oauth provider">Oauth Provider: </label>
                <?php echo $siswa['oauth_provider'] ?>
            </p>
            <p>
                <label for="oauth_uid">Oauth UID: </label>
                <?php echo $siswa['oauth_uid'] ?>
            </p>
            <p>
                <label for="email">Email: </label>
                <?php echo $siswa['email'] ?>
            </p>
            <p>
                <label for="gender">Gender: </label>
                <?php echo $siswa['gender'] ?>
            </p>
            <p>
                <label for="locale">Lokasi: </label>
                <?php echo $siswa['locale'] ?>
            </p>
            <p>
                <label for="gpluslink">Google Link: </label>
                <?php echo $siswa['gpluslink'] ?>
            </p>
            <p>
                <label for="picture">Picture: </label>
                <?php echo $siswa['picture'] ?>
            </p>
            <p>
                <label for="created ad">Created At: </label>
                <?php echo $siswa['created'] ?>
            </p>
            <p>
                <label for="plat_nomor">Modified ad: </label>
                <?php echo $siswa['modified'] ?>
            </p>
            <p>
                <input type="submit" value="Kembali" name="simpan" class="simpan"/>
            </p>

        </fieldset>

    </form>

</body>

</html>