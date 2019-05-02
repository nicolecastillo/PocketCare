<?php
	require 'basedatos.php';
	$message = '';

	if(!empty($_POST['Imagen']) && !empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Apellido2']) && !empty($_POST['Edad']) && !empty($_POST['TipoSangre']) && !empty($_POST['Alergias'])){

		if($_POST['TipoSangre'] != 'A+' && $_POST['TipoSangre'] != 'A-' && $_POST['TipoSangre'] != 'AB+' && $_POST['TipoSangre'] != 'AB-' && $_POST['TipoSangre'] != 'O+' && $_POST['TipoSangre'] != 'O-'){
			$message = 'Tipo de sangre no válido (Utilice letras mayúsculas)';
    if ($_POST['Edad'] > 12) {
      $message = 'Edad no válida (La edad máxima son 12 años)';
    }
		}else{
			$sql = "INSERT INTO alumnos (imagen, nombre, nombre2, apellido, apellido2, edad, tiposangre, alergias) VALUES('$_POST[Imagen]', '$_POST[Nombre]', '$_POST[Nombre2]', '$_POST[Apellido]', '$_POST[Apellido2]', '$_POST[Edad]', '$_POST[TipoSangre]', '$_POST[Alergias]')";

			$stmt = $conn->prepare($sql);
			if($stmt->execute()){
				$message = 'Alumno registrado exitosamente!';
			}else{
				$message = 'Error al registrar';
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sign Up</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<?php require 'partials/header.php'?>

	<!--</header><!-- /header >>

	</header><!-- /header >>-->

	<a href="index.php" ><img src="images/logo_1.png" alt="" /></a>

	<?php if(!empty($message)): ?>
		<p> <?= $message ?></p>
	<?php endif; ?>

	<h1>Registrar Alumno</h1>

	<form action="registroAlumno.php" method="post">
		<t> Seleccionar imagen del alumno </t><br>

		<input name = "Imagen" type="file" name="imagen">
		<input name="Nombre" type="text" placeholder="Primer nombre">
		<input name="Nombre2" type="text" placeholder="Segundo nombre (opcional)">
		<input name="Apellido" type="text" placeholder="Primer Apellido">
		<input name="Apellido2" type="text" placeholder="Segundo Apellido">
		<input name="Edad" type="text" placeholder="Edad">
		<input name="TipoSangre" type="text" placeholder="Tipo de sangre">
		<input name="Alergias" type="text" placeholder="Alergias">
		<input type="submit" value="submit">
	</form>

</body>
</html>
