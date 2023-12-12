<?php
require_once "config/database.php";
require_once "../koneksi.php";

$resultMahasiswaIlkom = mysqli_query($row, "SELECT COUNT(*) AS total_rows FROM mahasiswa_ilkom");
$rowMahasiswaIlkom = mysqli_fetch_assoc($resultMahasiswaIlkom);
$totalKRS = $rowMahasiswaIlkom['total_rows'];

$resultUsers1 = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM users");
$rowUsers1 = mysqli_fetch_assoc($resultUsers1);
$totalUsers1 = $rowUsers1['total_rows'];

$resultUsers2 = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM users2");
$rowUsers2 = mysqli_fetch_assoc($resultUsers2);
$totalUsers2 = $rowUsers2['total_rows'];

$totalUsers = $totalUsers1 + $totalUsers2;


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
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
			<li class="active">
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
						<!-- <li><i class='bx bx-chevron-right' ></i></li> -->
						<!-- <li>
							<a class="active" href="#">DHS</a>
						</li> -->
					</ul>
				</div>

			</div>

			<ul class="box-info">
				<li>
					<i class="bx bxs-calendar-check"></i>
					<span class="text">
						<h3><?php echo $totalKRS; ?></h3>
						<p>KRS</p>
					</span>
				</li>
				<li>
					<i class="bx bxs-group"></i>
					<span class="text">
						<h3><?php echo $totalUsers; ?></h3>
						<p>Users</p>
					</span>
				</li>
			</ul>


		</main>
		<!-- MAIN -->
	</section>
	<script src="script.js"></script>
</body>

</html>