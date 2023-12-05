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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        $nama = $_POST["inputName"];
        $nim = $_POST["inputNIM"];
        $prodi = $_POST["inputProdi"];
        $alamat = $_POST["inputAlamat"];
        $hp = $_POST["inputHP"];
        $email = $_POST["inputEmail"];
        $gender = $_POST["gridRadios"];

        $sql = "INSERT INTO biodata (NAMA, NIM, PRODI, ALAMAT, HP, EMAIL, GENDER, USERNAME) VALUES (
            '$nama', '$nim', '$prodi', '$alamat', '$hp', '$email', '$gender', '$username'
        )";

        mysqli_query($conn, $sql);
    }
}

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
    </nav>
    <div class="container form_content">
        <form method="POST">
            <div class="row mb-3">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" name="inputName" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputNIM" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNIM" name="inputNIM" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputProdi" class="col-sm-2 col-form-label">Prodi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputProdi" name="inputProdi" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputAlamat" name="inputAlamat" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputHP" class="col-sm-2 col-form-label">No.HP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputHP" name="inputHP" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" />
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Laki-laki" checked />
                        <label class="form-check-label" for="gridRadios1">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Perempuan" />
                        <label class="form-check-label" for="gridRadios2">
                            Perempuan
                        </label>
                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success" name="add">Submit</button>
        </form>
    </div>
</body>

</html>