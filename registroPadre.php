<?php
	require 'basedatos.php';
	$message = '';
	$dato = '';

	if(!empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Apellido2']) && !empty($_POST['usuario']) && !empty($_POST['contraseña']) && !empty($_POST['idHijo']) && !empty($_POST['email'])){

		$sql = "SELECT * FROM alumnos WHERE id = '$_POST[idHijo]'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$resul = $stmt->fetchAll();
		if($resul != NULL){
			$sql = "INSERT INTO cuentas (tipocuenta, nombre, nombre2, apellido, apellido2, nombreusuario, contrasena, hijos, correo) VALUES('0', '$_POST[Nombre]', '$_POST[Nombre2]', '$_POST[Apellido]', '$_POST[Apellido2]', '$_POST[usuario]', '$_POST[contraseña]', '$_POST[idHijo]', '$_POST[email]')";

			$stmt = $conn->prepare($sql);
			if($stmt->execute()){
				$message = 'Usuario registrado exitosamente!';
			}else{
				$message = 'Error :(';
			}
		}else{
			$message = 'Error. El ID de su hijo es incorrecto';
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

	<h1>Registrar padre</h1>
	<span>o <input type="reset" value="Login" onclick="location='login.php'"></span>

	<form action="registroPadre.php" method="POST">
		<input name="Nombre" type="text" placeholder="Primer nombre">
		<input name="Nombre2" type="text" placeholder="Segundo nombre (opcional)">
		<input name="Apellido" type="text" placeholder="Primer apellido">
		<input name="Apellido2" type="text" placeholder="Segundo apellido">
		<input name="email" type="text" placeholder="Correo electronico">
		<input name="usuario" type="text" placeholder="Nombre de usuario">
		<input name="contraseña" type="password" placeholder="Contraseña">
		<input name="ConfirmContraseña" type="password" placeholder="Contraseña">
		<input name="idHijo" type="text" placeholder="ID de su hijo">
		<input type="submit" value="Submit">
	</form>
	
</body>
</html>
