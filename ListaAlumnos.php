<?php
	require 'basedatos.php';
	$message = '';
	$aid = $_GET['resultado'];
	$busqueda= $conn->query("SELECT * FROM alumnos INNER JOIN inscripciones ON (alumnos.id = inscripciones.IdAlumno) WHERE inscripciones.grupo = '$_GET[resultado]'");
	$prueba = $busqueda->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lista de Alumnos</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}

		/* The Modal (background) */
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		  background-color: #fefefe;
		  margin: auto;
		  padding: 20px;
		  border: 1px solid #888;
		  width: 80%;
		}

		/* The Close Button */
		.close {
		  color: #aaaaaa;
		  float: right;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: #000;
		  text-decoration: none;
		  cursor: pointer;
		}
		</style>
</head>
<body>
	<?php require 'partials/header.php'?>

	<a href="index.php" ><img src="images/logo_1.png" alt="" /></a>
	<h1>ALUMNOS</h1>

	<table style="border:1px solid black; border-collapse: collapse;">
		<thead>
			<th width="500" style="border:1px solid black; border-collapse: collapse;">Nombre</th>
			<th width="500" style="border:1px solid black; border-collapse: collapse;">Segundo nombre</th>
			<th width="500" style="border:1px solid black; border-collapse: collapse;">Apellido paterno</th>
			<th width="500" style="border:1px solid black; border-collapse: collapse;">Apellido materno</th>
			<th width="500" style="border:1px solid black; border-collapse: collapse;">Evaluacion</th>
		</thead>
		<tbody>
			<?php
			$valor;
			foreach ($prueba as $re)
			{
				$valor = $re['ID'];
			?>
				<tr>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['NOMBRE'];  ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['NOMBRE2']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['APELLIDO']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['APELLIDO2']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo "<a href='evaluacionDiaria.php?identificador=$valor'>" . "Evaluar" . "</a>"; ?></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>

	<button id="btn1">Agregar alumno al grupo</button>

	<div id ="myModal" class="modal">
		<div class="modal-content">
			<span class="close">x</span>
			<form method="post">
				<table style="border:1px solid black; border-collapse: collapse;">
					<thead>
						<th width="500" style="border:1px solid black; border-collapse: collapse;">Nombre</th>
						<th width="500" style="border:1px solid black; border-collapse: collapse;">Segundo nombre</th>
						<th width="500" style="border:1px solid black; border-collapse: collapse;">Apellido paterno</th>
						<th width="500" style="border:1px solid black; border-collapse: collapse;">Apellido materno</th>
					</thead>
				<tbody>

						<?php
						$busqueda2 = $conn->query("SELECT * FROM alumnos");
						$prueba2 = $busqueda2->fetchAll(PDO::FETCH_ASSOC);
						foreach ($prueba2 as $res)
						{
						?>
							<tr>
							<td style="border:1px solid black; border-collapse: collapse;"><?php echo $res['NOMBRE']; ?></td>
							<td style="border:1px solid black; border-collapse: collapse;"><?php echo $res['NOMBRE2']; ?></td>
							<td style="border:1px solid black; border-collapse: collapse;"><?php echo $res['APELLIDO']; ?></td>
							<td style="border:1px solid black; border-collapse: collapse;"><?php echo $res['APELLIDO2']; ?></td>
							</tr>
						<?php
						}
						?>
				</tbody>
				</table>
				<?php
					if(!empty($_POST['idk'])){
						$sql = "INSERT INTO inscripciones (`CicloEcolar`, `IdAlumno`, `grupo`) VALUES('2019-I', '$_POST[idk]', '$aid')";
						$stmt = $conn->prepare($sql);
						if($stmt->execute()){
							$message ='Alumno agregado exitosamente!';
						}else{
							$message = 'Error al agregar';
						}
						echo $aid;
					}
				?>
				<form action="ListaAlumnos.php" method="get">
					<input type="submit" name="submit" value="Agregar">
				</form>
			</form>
		</div>
	</div>

	<?php if(!empty($message)): ?>
		<p> <?= $message ?></p>
	<?php endif; ?>

	<script>
		var modal = document.getElementById('myModal');

		var btn = document.getElementById("btn1");

		var span = document.getElementsByClassName("close")[0];

		btn.onclick = function() {
		  modal.style.display = "block";
		}
		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		  modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal) {
		    modal.style.display = "none";
		  }
		}
	</script>

</body>
</html>
