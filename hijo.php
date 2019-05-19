<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
		require 'basedatos.php';
		$message = '';
		$db = mysqli_connect("localhost","root","","bd_PocketCare");

		$nombreCuenta = $_GET['miHijo'];

		$stmt20 = $conn->query("SELECT hijos FROM cuentas WHERE nombreusuario = '$nombreCuenta'");
		$IdHijo = $stmt20->fetch(PDO::FETCH_ASSOC);
	  $stmt1 = $conn->query("SELECT nombre FROM alumnos WHERE id = '$IdHijo[hijos]'");
		$nombre = $stmt1->fetch(PDO::FETCH_ASSOC);
	  $stmt2 = $conn->query("SELECT nombre2 FROM alumnos WHERE id = '$IdHijo[hijos]'");
		$nombre2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	  $stmt3 = $conn->query("SELECT apellido FROM alumnos WHERE id = '$IdHijo[hijos]'");
		$apellido = $stmt3->fetch(PDO::FETCH_ASSOC);
	  $stmt4 = $conn->query("SELECT apellido2 FROM alumnos WHERE id = '$IdHijo[hijos]'");
		$apellido2 = $stmt4->fetch(PDO::FETCH_ASSOC);

		$stmt30 = $conn->query("SELECT tiposangre FROM alumnos WHERE id = '$IdHijo[hijos]'");
		$sangre = $stmt30->fetch(PDO::FETCH_ASSOC);
		$stmt31 = $conn->query("SELECT alergias FROM alumnos WHERE id = '$IdHijo[hijos]'");
		$alergias = $stmt31->fetch(PDO::FETCH_ASSOC);
		$stmt32 = $conn->query("SELECT comportamiento FROM alumnos WHERE id = '$IdHijo[hijos]'");
		$comportamiento = $stmt32->fetch(PDO::FETCH_ASSOC);
		$stmt33 = $conn->query("SELECT evaluaciondiaria FROM alumnos WHERE id = '$IdHijo[hijos]'");
		$evaluacion = $stmt33->fetch(PDO::FETCH_ASSOC);

		$sql = "SELECT imagen FROM alumnos WHERE id =  '$IdHijo[hijos]'";
		$sth = $db->query($sql);
		$imagen=mysqli_fetch_array($sth);

 ?>
<html>
	<head>
		<title>Perfil Alumno</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="left-sidebar is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">

					<!-- Logo -->
						<h1>
							<a href="index.html"><?php echo $nombre['nombre']; echo " "; echo $nombre2['nombre2'];  echo " "; echo $apellido['apellido'];  echo " "; echo $apellido2['apellido2'];  echo " ";?></a>
						</h1>


				</section>

			<!-- Main -->
				<section id="main">
					<div class="container">
						<div class="row">
							<div class="col-4 col-12-medium">

								<!-- Sidebar -->
									<section class="box">
										<?php echo '<br><img src= "data:image/jpeg;base64,'.base64_encode( $imagen['imagen'] ).' " width = "100%" heigth="100%"/>'; ?>
										<!-- <a href="#" class="image featured"><img src="images/hijo_1.jpg" alt="" /></a> -->
									</section>

							</div>
							<div class="col-8 col-12-medium imp-medium">

								<!-- Content -->
									<article class="box post">
										<header>
											<h2>Datos:</h2>
											<p>

														<u><b><?php 		echo "Nombre completo:"; ?></b></u>
														<br><?php			echo "      "; echo $nombre['nombre']; echo " "; echo $nombre2['nombre2'];  echo " "; echo $apellido['apellido'];  echo " "; echo $apellido2['apellido2'];  echo " ";?>
													 <br><br>

													 <u><b><?php 		echo "Tipo de sangre:"; ?></b></u>
													 	<br><?php			echo "    "; echo $sangre['tiposangre']; ?>
													 <br>	<br>

													<u><b><?php 		echo "Alergias:"; ?></b></u>
													 	<br><?php			echo "    "; echo $alergias['alergias']; ?>
												  <br><br>

													<u><b><?php 		echo "Comportamiento:"; ?></b></u>
													 <br><?php			echo "    "; echo $comportamiento['comportamiento']; ?>
													 <br><br>

													 <u><b><?php 		echo "Evaluacion Diaria:"; ?></b></u><br>
													 <br>
													 <?php			echo "    "; echo $evaluacion['evaluaciondiaria']; ?>
													 <br>
																      <br><br><br>
											</p>

										</header>
									</article>
									<?php
											 echo "<a href='/PocketCare'>" . "Regresar" . "</a>";
									?>

							</div>
						</div>
					</div>
				</section>



		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
