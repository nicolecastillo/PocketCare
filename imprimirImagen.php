<?php
	require 'basedatos.php';
	$message = '';

	$db = mysqli_connect("localhost","root","","bd_PocketCare");
	$sql = "SELECT imagen FROM alumnos WHERE id =  3";
	$sth = $db->query($sql);
	$result=mysqli_fetch_array($sth);
	echo '<img src= "data:image/jpeg;base64,'.base64_encode( $result['imagen'] ).' " width = "20%" heigth="20%"/>';


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

	<h1>Insertar Imagenes</h1>

	<form action="registroAlumno.php" method="post">
		<t> Este archivo es para que copien el codigo php para usar imagenes de la bd </t><br>
	</form>

</body>
</html>
