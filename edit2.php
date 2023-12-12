<?php

include "koneksi.php";

if (!isset($_GET['username'])) {
    header('Location: table/admin_akun.php');
}

$username = $_GET['username'];

$sql = "SELECT * FROM users2 WHERE username='$username'";
$query = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

$goTo = "table/admin_akun.php";
?>


<!DOCTYPE html>
<html>

<head>
    <title>Edit</title>
    <style>
        body {
            font-family: "Courier", sans-serif;
            background: linear-gradient(90deg, rgb(0, 228, 100) 0% 25%, rgb(255, 200, 100), rgb(0, 228, 100) 75% 100%);
            color: rgb(255, 0, 0);
        }

        input:hover{
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h3>Edit Form</h3>
    </header>

    <form action="proses-edit2.php" method="POST">

        <fieldset>

            <input type="hidden" name="username" value="<?php echo $siswa['username'] ?>" />

            <p>
                <label for="username">Username: </label>
                <input type="text" name="username" placeholder="Username" value="<?php echo $siswa['username'] ?>" readonly />
            </p>
            <p>
                <label for="password">Password: </label>
                <input type="text" name="password" placeholder="Password" value="<?php echo $siswa['password'] ?>" />
            </p>
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p>

        </fieldset>


    </form>

</body>

</html>