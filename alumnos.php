<?php
	require 'basedatos.php';
	$message = '';
	$busqueda= $conn->query("SELECT * FROM alumnos");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Alumnos</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}
		.modalDialog {
			position: fixed;
			font-family: Arial, Helvetica, sans-serif;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			background: rgba(0,0,0,0.8);
			z-index: 99999;
			opacity:0;
			-webkit-transition: opacity 400ms ease-in;
			-moz-transition: opacity 400ms ease-in;
			transition: opacity 400ms ease-in;
			pointer-events: none;
		}
		.modalDialog:target {
			opacity:1;
			pointer-events: auto;
		}
		.modalDialog > div {
			width: 400px;
			position: relative;
			margin: 10% auto;
			padding: 5px 20px 13px 20px;
			border-radius: 10px;
			background: #fff;
			background: -moz-linear-gradient(#fff, #999);
			background: -webkit-linear-gradient(#fff, #999);
			background: -o-linear-gradient(#fff, #999);
			-webkit-transition: opacity 400ms ease-in;
			-moz-transition: opacity 400ms ease-in;
			transition: opacity 400ms ease-in;
			}
		.close {
			background: #606061;
			color: #FFFFFF;
			line-height: 25px;
			position: absolute;
			right: -12px;
			text-align: center;
			top: -10px;
			width: 24px;
			text-decoration: none;
			font-weight: bold;
			-webkit-border-radius: 12px;
			-moz-border-radius: 12px;
			border-radius: 12px;
			-moz-box-shadow: 1px 1px 3px #000;
			-webkit-box-shadow: 1px 1px 3px #000;
			box-shadow: 1px 1px 3px #000;
		}
		.close:hover { background: #00d9ff; }
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
		</thead>
		<tbody>
			<?php
				$elAid = array();
				$i = 0;
			while ($_POST = $busqueda->fetch(PDO::FETCH_ASSOC)){
				$elAid[$i] = $_POST['ID'];
				echo "elAid:";
				echo $elAid[$i];
				echo "  i:" ;
				echo $i;
			?>
				 <tr>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $_POST['NOMBRE']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $_POST['NOMBRE2']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $_POST['APELLIDO']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $_POST['APELLIDO2']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><a href='#openModal'>Editar</a></td>
				</tr>
			<?php
			$i++;
			}
			?>
		</tbody>
	</tale>

	<form action="registroAlumno.php">
		<input type="submit" value="Registrar alumno">
	</form>

	<div id="openModal" class="modalDialog">
		<div>
			<a href="#close" title="Close" class="close">X</a>
			<h2>Alumno</h2>
			<p><?php echo $elAid[$i];?></p>
		</div>
	</div>
</body>
</html>
