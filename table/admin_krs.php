<?php
require_once "config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KRS</title>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="styles.css">
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
			<li class="active">
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
			<li>
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
							<a class="active" href="#">KRS</a>
						</li>
					</ul>
				</div>

			</div>

			<h3>Daftar KRS</h3><br>
			<!-- <table>
        <tr>
            <td>Nomor mahasiswa</td> // username
            <td>1313622000</td>
        </tr>
        <tr>
            <td>Nama Mahasiswa</td>
            <td>mhsswa</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>Ilmu Komputer</td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td>Fakultas Matematika dan Ilmu Pengetahuan Alam</td>
        </tr>
        <tr>
            <td>Angkatan</td>
            <td>202x</td>
        </tr>
       
    </table> -->
			<table>
				<tr>
					<th>No</th>
					<th>SEMESTER</th>
					<th>KELAS</th>
					<th>KODE MK</th>
					<th>NAMA MK</th>
					<th>SKS</th>
					<th>BOBOT</th>
				</tr>
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
					echo "<td>" . $row['bobot'] . "</td>";
					echo "</tr>";
				}

				?>
			</table>
		</main>
		<!-- MAIN -->
	</section>
	<script src="script.js"></script>
</body>

</html>