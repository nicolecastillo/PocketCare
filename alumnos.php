<?php
	require 'basedatos.php';
	$message = '';
	if(empty($_POST['Busca'])){
		$buscar = "";
	}else{
		$buscar = $_POST['Busca'];
	}
	
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
	<form action="alumnos.php" method="post" id="cdr">
		<h2>Buscar alumno</h2>
		<p>
			<input type="text" name="Busca">
			<input type="submit" name="Sub" value="Buscar">
		</p>
	</form>

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
			
			if($buscar != ''){
				$busqueda = $conn->query("SELECT * FROM alumnos WHERE nombre LIKE '%".$buscar."%'");
			}else{
				$busqueda= $conn->query("SELECT * FROM alumnos");
			}
			$prueba = $busqueda->fetchAll(PDO::FETCH_ASSOC);
			foreach ($prueba as $re){	
			?>
				 <tr>
				 	<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['ID']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['NOMBRE']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['NOMBRE2']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['APELLIDO']; ?></td>
					<td style="border:1px solid black; border-collapse: collapse;"><?php echo $re['APELLIDO2']; ?></td>
					<?php echo"<td><a href='datosAlumno.php?elAid=" . $re['ID'] . "'>Editar</a></td>"; ?>
					<td><a href="#" onclick="preguntar(<?php echo  $re["ID"]; ?>)">Eliminar</a></td>
				</tr>		

			<?php } ?>
		</tbody>	
	</tale>

	<form action="registroAlumno.php">
		<input type="submit" value="Registrar alumno">
	</form>

	<script type="text/javascript">
		function preguntar(id){
			if(confirm("¿Eliminar " + id + "?")){
				window.location.href = "borrarAlumno.php?id=" + id;
			}
		}
	</script>
</body>
</html>
