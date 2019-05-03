<?php
	require 'basedatos.php';
	$busqueda = $conn->query("SELECT * FROM grupos");
	$grupo = $busqueda->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lista de Grupos</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<?php require 'partials/header.php'?>

	<a href="index.php" ><img src="images/logo_1.png" alt="" /></a>
		<h1></h1>
		<table>
			<thead>
				<th width="500">Nombre de grupo</th>
				<th width="100">Alumnos</th>
				<th width="100">Eventos</th>
			</thead>
			<tbody>
				<?php 
				foreach ($grupo as $r)
				{
					$valor = $r['ID'];
				?>
					<tr>
						<td><?php echo "<a href='ListaAlumnos.php?resultado=$valor'>" . $r['NOMBRE'] . "</a>"; ?></td>
						<td><?php echo $r['ALUMNOS']; ?></td>
						<td><?php echo $r['EVENTOS']; ?></td>
					</tr>
				<?php
				}
				?>
			</tbody>	
		</table>
</body>
</html>