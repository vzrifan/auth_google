<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete"])) {
        $idToDelete = $_POST["idToDelete"];
        $sql = "DELETE FROM data_dasar WHERE ID = '$idToDelete'";
        mysqli_query($conn, $sql);
    } elseif (isset($_POST["add"])) {
        $id = $_POST["ID"];
        $nim = $_POST["NIM"];
        $nama = $_POST["NAMA"];
        $semester = $_POST["SEMESTER"];
        $alamat = $_POST["ALAMAT"];
        $notelp = $_POST["NO_TELP"];
        $prodi = $_POST["PRODI"];
        $fakultas = $_POST["FAKULTAS"];
        $tahun_masuk = $_POST["TAHUNMASUK"];
        $ukt = $_POST["UKT"];
        $status_ukt = $_POST["STATUSUKT"];
        $gender = $_POST["GENDER"];
        $password = $_POST["PASSWORD"];
        $plat_nomor = $_POST["PLATNOMOR"];

        $sql = "INSERT INTO data_dasar (ID, NIM, NAMA, SEMESTER, ALAMAT, NO_TELP, PRODI, FAKULTAS, TAHUNMASUK, UKT, STATUSUKT, GENDER, PASSWORD, PLATNOMOR) VALUES ('$id', '$nim', '$nama', '$semester', '$alamat', '$notelp', '$prodi', '$fakultas', '$tahun_masuk', '$ukt' ,'$status_ukt', '$gender', '$password', '$plat_nomor')";
        mysqli_query($conn, $sql);
    }
}

$data = mysqli_query($conn, "SELECT * FROM data_dasar");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1 class="title">Data Mahasiswa</h1>

    <div class="main">

        <form method="POST" class="addButton">
            <input type="button" id="addButton" value="Add">
        </form>

        <form method="POST" action="index.php" class="logout">
            <input type="submit" value="Logout">
        </form>

        <div id="addForm" style="display: none;">
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="ID" placeholder="NO" required><br>
                <input type="text" name="NIM" placeholder="NIM" required><br>
                <input type="text" name="NAMA" placeholder="Nama" required><br>
                <input type="text" name="SEMESTER" placeholder="Semester" required><br>
                <input type="text" name="ALAMAT" placeholder="Alamat" required><br>
                <input type="text" name="NO_TELP" placeholder="No Telepon" required><br>
                <input type="text" name="PRODI" placeholder="Prodi" required><br>
                <input type="text" name="FAKULTAS" placeholder="Fakultas" required><br>
                <input type="text" name="TAHUNMASUK" placeholder="Tahun Masuk" required><br>
                <input type="text" name="UKT" placeholder="UKT" required><br>
                <input type="text" name="STATUSUKT" placeholder="Status UKT" required><br>
                <input type="text" name="GENDER" placeholder="Gender" required><br>
                <input type="text" name="PASSWORD" placeholder="Password" required><br>
                <input type="text" name="PLATNOMOR" placeholder="Plat Nomor" required><br>
                <input type="submit" name="add" value="Submit">
            </form>
        </div>

        <table>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Semester</th>
                <th>Prodi</th>
                <th>Fakultas</th>
                <th>UKT</th>
                <th>Status UKT</th>
                <th>Tindakan</th>
            </tr>
            <?php
            while ($baris = mysqli_fetch_assoc($data)) :
            ?>
                <tr>
                    <td><?= $baris["ID"] ?></td>
                    <td><?= $baris["NIM"] ?></td>
                    <td><?= $baris["NAMA"] ?></td>
                    <td><?= $baris["SEMESTER"] ?></td>
                    <td><?= $baris["PRODI"] ?></td>
                    <td><?= $baris["FAKULTAS"] ?></td>
                    <td><?= $baris["UKT"] ?></td>
                    <td><?= $baris["STATUSUKT"] ?></td>
                    <td class="allButton">
                        <a href="read.php?id=<?= $baris["ID"] ?>">
                            <input type="submit" name="readButton" value="Read" id="readButton" class="readButton">
                        </a>
                        <a href="edit.php?id=<?= $baris["ID"] ?>">
                            <input type="button" value="Edit" class="editButton">
                        </a>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="idToDelete" value="<?= $baris["ID"] ?>">
                            <input type="submit" name="delete" value="Delete" class="delButton">
                        </form>
                    </td>
                </tr>
            <?php
            endwhile;
            ?>
        </table>
    </div>

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