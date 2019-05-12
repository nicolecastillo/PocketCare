<?php
	$message = '';

	$consulta = ConsultarAlumno($_GET['elAid']);

	function ConsultarAlumno($id_a){
		require 'basedatos.php';
		$sentencia = "SELECT * FROM alumnos WHERE id = '".$id_a."' ";
		$resultado = $conn->query($sentencia);
		$filas = $resultado->fetch(PDO::FETCH_ASSOC);
		return[
			$filas['ID'],
			$filas['IMAGEN'],
			$filas['NOMBRE'],
			$filas['NOMBRE2'],
			$filas['APELLIDO'],
			$filas['APELLIDO2'],
			$filas['EDAD'],	
			$filas['TIPOSANGRE'],
			$filas['ALERGIAS'],
			$filas['EVALUACIONDIARIA']
		];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lista de Alumnos</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<?php require 'partials/header.php'?>

	<a href="index.php" ><img src="images/logo_1.png" alt="" /></a>

	<?php if(!empty($message)): ?>
		<p> <?= $message ?></p>
	<?php endif; ?>

	<?php
	$db = mysqli_connect("localhost","root","","bd_PocketCare");
	$sql = "SELECT imagen FROM alumnos WHERE id =  '$_GET[elAid]'";
	$sth = $db->query($sql);
	$result=mysqli_fetch_array($sth);
	echo '<img src= "data:image/jpeg;base64,'.base64_encode( $result['imagen'] ).' " width = "20%" heigth="20%"/>';?>

	<form action="guardarCambios.php" method="POST">
		<input type="hidden" id="Id" name="Id" value="<?php echo $consulta['0'];?>">
		Nombre: <input id="Nombre" name="Nombre" type="text" value="<?php echo $consulta['2'];?>">
		Segundo nombre: <input name="Nombre2" type="text" value="<?php echo $consulta['3']; ?>">
		Apellido paterno: <input name="Apellido" type="text" value="<?php echo $consulta['4']; ?>">
		Apellido materno: <input name="Apellido2" type="text" value="<?php echo $consulta['5']; ?>">
		Edad: <input name="Edad" type="text" value="<?php echo $consulta['6']; ?>">
		Tipo de sangre: <input name="TipoSangre" type="text" value="<?php echo $consulta['7']; ?>">
		Alergias: <input name="Alergias" type="text" value="<?php echo $consulta['8']; ?>">
		<input type="submit" name="sub" value="Guardar cambios">
	</form>
</body>
</html>