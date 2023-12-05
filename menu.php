<?php
include "conn.php";
session_start();

if (isset($_SESSION["user_id"])) {
    $username = $_SESSION["user_id"];
} elseif (isset($_SESSION['google_data']['name'])) {
    $username = $_SESSION['google_data']['name'];
} else {
    header("location:index.php");
}


$data = mysqli_query($conn, "SELECT * FROM biodata WHERE USERNAME = '$username'");

if (!$data) {
    // echo "<script>alert('$e');</script>";
    header("location:biodata.php");
}



$nama = "";
$nim = "";
$prodi = "";
$alamat = "";
$hp = "";
$email = "";
$gender = "";

while ($baris = mysqli_fetch_assoc($data)) {
    $nama = $baris['NAMA'];
    $nim = $baris['NIM'];
    $prodi = $baris['PRODI'];
    $alamat = $baris['ALAMAT'];
    $hp = $baris['HP'];
    $email = $baris['EMAIL'];
    $gender = $baris['GENDER'];
}

if ($nama == "") {
    $msg = "Please enter your biodata!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasil = false;

    if (isset($_POST["add"])) {
        $semester = $_POST["SEMESTER"];
        $kelas = $_POST["KELAS"];
        $kode_mk = $_POST["KODEMK"];
        $nama_mk = $_POST["NAMAMK"];
        $sks = $_POST["SKS"];
        $nilai = $_POST["NILAI"];
        $bobot = $_POST["BOBOT"];

        $sql = "INSERT INTO mahasiswa_ilkom (semester, kelas, kode_mk, nama_mk, sks, nilai, bobot, username) 
                VALUES ('$semester', '$kelas', '$kode_mk', '$nama_mk', '$sks', '$nilai', '$bobot', '$username')";

        $hasil = mysqli_query($conn, $sql);
    } elseif (isset($_POST["delete"])) {
        $idToDelete = $_POST["idToDelete"];
        $sql = "DELETE FROM mahasiswa_ilkom WHERE kelas = '$idToDelete'";
        $hasil = mysqli_query($conn, $sql);
    }
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

$result = mysqli_query($conn, "SELECT * FROM mahasiswa_ilkom WHERE USERNAME = '$username' AND (semester LIKE '%$search%' OR kelas LIKE '%$search%' OR kode_mk LIKE '%$search%' OR nama_mk LIKE '%$search%' OR sks LIKE '%$search%' OR nilai LIKE '%$search%' OR bobot LIKE '%$search%')");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="styles3.css" rel="stylesheet" />
    <link href="styles4.css" rel="stylesheet" />

    <title>Home</title>
</head>

<body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <nav class="navbar navbar-expand-lg navbar-light bg-success navbar_content">
        <div class="container-fluid content_navbar">
            <a class="navbar-brand" href="home.php" style="color: white">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="menu.php" style="color: white">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="biodata.php" style="color: white">Biodata</a>
                    </li>
                    <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link disabled"
                  href="#"
                  tabindex="-1"
                  aria-disabled="true"
                  >Disabled</a
                >
              </li> -->
                </ul>
                <!-- <form class="d-flex">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Search
              </button>
            </form> -->
            </div>
        </div>
        <form class="d-flex" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-dark searchBtn" type="submit">Search</button>
        </form>

    </nav>
    <div id="addForm" style="display: none;">
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="SEMESTER" placeholder="Semester" required><br>
            <input type="text" name="KELAS" placeholder="Kelas" required><br>
            <input type="text" name="KODEMK" placeholder="Kode MK" required><br>
            <input type="text" name="NAMAMK" placeholder="Nama MK" required><br>
            <input type="text" name="SKS" placeholder="SKS" required><br>
            <input type="text" name="NILAI" placeholder="Nilai" required><br>
            <input type="text" name="BOBOT" placeholder="Bobot" required><br>
            <input type="submit" name="add" value="Submit">
        </form>
    </div>
    <?php
    if (isset($msg)) {
        echo "<p>$msg</p>";
    }

    ?>
    <table>
        <tr>
            <td>NIM</td>
            <td><?= $nim ?></td>
        </tr>
        <tr>
            <td>Nama Mahasiswa</td>
            <td><?= $nama ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td><?= $prodi ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?= $alamat ?></td>
        </tr>
        <tr>
            <td>Nomor Hp</td>
            <td><?= $hp ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?= $gender ?></td>
        </tr>
    </table>
    <form method="POST" class="addButton">
        <input type="button" id="addButton" value="Add">
    </form>
    <table>
        <?php
        $no = 1;

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['semester'] . "</td>";
            echo "<td>" . $row['kelas'] . "</td>";
            echo "<td>" . $row['kode_mk'] . "</td>";
            echo "<td>" . $row['nama_mk'] . "</td>";
            echo "<td>" . $row['sks'] . "</td>";
            echo "<td>" . $row['nilai'] . "</td>";
            echo "<td>" . $row['bobot'] . "</td>";
            echo '<td class="allButton">';
            echo '<form method="POST" style="display:inline;">';
            echo '<input type="hidden" name="idToDelete" value="' . $row["kelas"] . '">';
            echo '<button type="submit" name="delete" class="delButton">Delete</button>';
            echo '</form>';
            echo '</td>';
            echo "</tr>";
        }
        ?>
    </table>
    <script>
        function closeFormOnClickOutside(form, button, event) {
            return function(event) {
                if (!form.contains(event.target) && event.target !== button) {
                    form.style.display = "none";
                    document.removeEventListener("click", closeFormOnClickOutside(form, button));
                }
            };
        }

        const addForm = document.getElementById("addForm");
        const addButton = document.getElementById("addButton");

        addButton.addEventListener("click", function(event) {
            addForm.style.display = "block";
            document.addEventListener("click", closeFormOnClickOutside(addForm, addButton));
        });
    </script>
</body>

</html>