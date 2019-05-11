<?php
	require 'basedatos.php';
	$message = '';
	$busqueda= $conn->query("SELECT * FROM alumnos");
	$prueba = $busqueda->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Alumnos</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<?php require 'partials/header.php'?>

	<a href="index.php" ><img src="images/logo_1.png"/></a>
	<h1>ALUMNOS</h1>

	<table style="border:1px solid black; border-collapse: collapse;">
		<thead>
			<th width="300" style="border:1px solid black; border-collapse: collapse;">Id</th>
			<th width="300" style="border:1px solid black; border-collapse: collapse;">Nombre</th>
			<th width="300" style="border:1px solid black; border-collapse: collapse;">Segundo nombre</th>
			<th width="300" style="border:1px solid black; border-collapse: collapse;">Apellido paterno</th>
			<th width="300" style="border:1px solid black; border-collapse: collapse;">Apellido materno</th>
		</thead>
		<tbody>
			<?php
<<<<<<< HEAD
			foreach ($prueba as $re){	
			?>
				 <tr>
				 	<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['ID']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['NOMBRE']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['NOMBRE2']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['APELLIDO']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['APELLIDO2']; ?></td>
					<?php echo"<td><a href='datosAlumno.php?elAid=" . $re['ID'] . "'>Editar</a></td>"; ?>
				</tr>		

			<?php } ?>
		</tbody>	
=======
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
>>>>>>> 24fb721653e4d30c8d78f141f0d84ec906c9191c
	</tale>

	<form action="registroAlumno.php">
		<input type="submit" value="Registrar alumno">
	</form>

<<<<<<< HEAD
=======
	<div id="openModal" class="modalDialog">
		<div>
			<a href="#close" title="Close" class="close">X</a>
			<h2>Alumno</h2>
			<p><?php echo $elAid[$i];?></p>
		</div>
	</div>
>>>>>>> 24fb721653e4d30c8d78f141f0d84ec906c9191c
</body>
</html>
