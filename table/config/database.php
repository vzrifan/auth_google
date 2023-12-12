<?php
// buat koneksi dengan MySQL, gunakan database: universitas
$row = mysqli_connect("localhost", "root", "", "data_mahasiswa");
 
// jalankan query
$result = mysqli_query($row, "SELECT * FROM mahasiswa_ilkom");
?>