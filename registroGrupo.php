<?php
	require 'basedatos.php';
	$message = '';

	if(!empty($_POST['Nombre'])){

		$sql = "INSERT INTO grupos(nombre) VALUES('$_POST[Nombre]')";

		$stmt = $conn->prepare($sql);
		if($stmt->execute()){
			$message = '¡Grupo registrado exitosamente!';
		}else{
			$message = 'Error :(';
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

	<h1>Registrar grupo</h1>

	<form action="registroGrupo.php" method="POST">
		<input name="Nombre" type="text" placeholder="Nombre del grupo">
		<input type="submit" value="Submit">
	</form>
	
</body>
</html>