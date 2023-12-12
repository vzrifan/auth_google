<?php
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete"])) {
        $idToDelete = $_POST["idToDelete"];
        $sql = "DELETE FROM users WHERE ID = '$idToDelete'";
        mysqli_query($conn, $sql);
    }
}

$row = mysqli_connect("localhost", "root", "", "auth_google");

$result = mysqli_query($row, "SELECT * FROM users");
$result2 = mysqli_query($row, "SELECT * FROM users2");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akun</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../styles5.css">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-doughnut-chart'></i>
            <span class="text">Siakad</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="admin_dashboard.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="admin_krs.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">KRS</span>
                </a>
            </li>
            <li>
                <a href="admin_nilai.php">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Nilai</span>
                </a>
            </li>
            <li class="active">
                <a href="admin_akun.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Akun</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../index.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Dashboard</a>


        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Akun</a>
                        </li>
                    </ul>
                </div>

            </div>

            <h3>Daftar Akun</h3><br>
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Email</th>
                            <th>Lokasi</th>
                            <th>Tindakan</th>
                        </tr>
                        <?php
                        while ($baris = mysqli_fetch_assoc($result)) :
                        ?>
                            <tr>
                                <td><?= $baris["id"] ?></td>
                                <td><?= $baris["fname"] ?></td>
                                <td><?= $baris["lname"] ?></td>
                                <td><?= $baris["email"] ?></td>
                                <td><?= $baris["locale"] ?></td>
                                <td class="allButton">
                                    <a href="../read2.php?id=<?= $baris["id"] ?>">
                                        <input type="submit" name="readButton" value="Read" id="readButton" class="readButton">
                                    </a>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="idToDelete" value="<?= $baris["id"] ?>">
                                        <input type="submit" name="delete" value="Delete" class="delButton">
                                    </form>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </table>
                </div>
                <div class="col">
                    <table>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Tindakan</th>
                        </tr>
                        <?php
                        while ($baris = mysqli_fetch_assoc($result2)) :
                        ?>
                            <tr>
                                <td><?= $baris["username"] ?></td>
                                <td><?= $baris["password"] ?></td>
                                <td class="allButton">
                                    <a href="../edit2.php?username=<?= $baris["username"] ?>">
                                        <input type="button" value="Edit" class="editButton">
                                    </a>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="idToDelete" value="<?= $baris["username"] ?>">
                                        <input type="submit" name="delete" value="Delete" class="delButton">
                                    </form>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </table>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <script src="script.js"></script>
</body>

</html>