<?php
	require 'basedatos.php';
	$message = '';
	$aid = $_GET['elAid'];
	$busqueda= $conn->query("SELECT * FROM alumnos WHERE id = '$_GET[elAid]'");
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

	<?php
	while ($_POST = $busqueda->fetch(PDO::FETCH_ASSOC)) {
	?>
		<form action="datosAlumno.php">
			Nombre: <input name="Nombre" type="text" value="<?php echo $_POST['NOMBRE'];?>">
			Segundo nombre: <input name="Nombre2" type="text" value="<?php echo $_POST['NOMBRE2']; ?>">
			Apellido paterno: <input name="Apellido" type="text" value="<?php echo $_POST['APELLIDO']; ?>">
			Apellido materno: <input name="Apellido2" type="text" value="<?php echo $_POST['APELLIDO2']; ?>">
			Edad: <input name="Edad" type="text" value="<?php echo $_POST['EDAD']; ?>">
			Tipo de sangre: <input name="TipoSangre" type="text" value="<?php echo $_POST['TIPOSANGRE']; ?>">
			Alergias: <input name="Alergias" type="text" value="<?php echo $_POST['ALERGIAS']; ?>">
		</form>

	<?php
	}
	?>

</body>
</html>