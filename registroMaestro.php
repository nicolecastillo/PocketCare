<?php
	require 'basedatos.php';
	$message = '';

	if(!empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Apellido2']) && !empty($_POST['usuario']) && !empty($_POST['contraseña']) && !empty($_POST['codigoEscuela'])){

		if($_POST['codigoEscuela'] != '1691'){
			$message = 'Cogido de escuela incorrecto.';
		}else{
			$sql = "INSERT INTO cuentas (tipocuenta, nombre, nombre2, apellido, apellido2, nombreusuario, contrasena) VALUES('1', '$_POST[Nombre]', '$_POST[Nombre2]', '$_POST[Apellido]', '$_POST[Apellido2]', '$_POST[usuario]', '$_POST[contraseña]')";

			$stmt = $conn->prepare($sql);
			if($stmt->execute()){
				$message = 'Usuario registrado exitosamente!';
			}else{
				$message = 'Error :(';
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

	<h1>Registrar maestro</h1>
	<span>o <input type="reset" value="Login" onclick="location='login.php'"></span>

	<form action="registroMaestro.php" method="POST">
		<input name="Nombre" type="text" placeholder="Primer nombre">
		<input name="Nombre2" type="text" placeholder="Segundo nombre (opcional)">
		<input name="Apellido" type="text" placeholder="Primer apellido">
		<input name="Apellido2" type="text" placeholder="Segundo apellido">
		<input name="usuario" type="text" placeholder="Nombre de usuario">
		<input name="contraseña" type="password" placeholder="Contraseña">
		<input name="ConfirmContraseña" type="password" placeholder="Contraseña">
		<input name="codigoEscuela" type="password" placeholder="Codigo de la escuela">
		<input type="submit" value="Submit">
	</form>
	
</body>
</html>
