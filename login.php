<?php  
	
	session_start();

	require 'basedatos.php';

	if (!empty($_POST['usuario']) && !empty($_POST['contraseña'])) {
		$records = $conn->prepare('SELECT id, tipocuenta, nombreusuario, contrasena FROM cuentas WHERE nombreusuario = :usuario');
		$records->bindParam(':usuario', $_POST['usuario']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if (/*count($results) > 0 && password_verify($_POST['contraseña'], $results['contrasena'])*/ $_POST['contraseña'] == $results['contrasena']) {
			$_SESSION['id_usuario'] = $results['id'];
			header('location: /PocketCare');
		} else {
			$message = 'Lo sentimos, los datos no coinciden';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<?php require 'partials/header.php' ?>
	<a href="index.php" ><img src="images/logo_1.png" alt="" /></a>
	<h1>Login</h1>
	<input type="reset" value="Sign Up" onclick="location='signup.php'">

	<?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

	<form action="login.php" method="POST"> 
		<input type="text" name="usuario" placeholder="Ingrese su nombre de usuario">
		<input type="password" name="contraseña" placeholder="Ingrese su contraseña">
		<input type="submit" value="Iniciar Sesión">
	</form>
	
</body>
</html>
