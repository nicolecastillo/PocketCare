<?php require 'basedatos.php' ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Grupos</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="./javascripts/application.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<?php require 'partials/header.php'?>

	<a href="index.php" ><img src="images/logo_1.png" alt="" /></a>

	<h1>Grupos</h1>

	<div style="text-align:center;">
		<table border="1" style="margin: 0 auto;">
			<caption>Grupos Activos</caption>
			<thead>
				<tr>
					<th width="100">ID</th>
					<th width="250">Grupo</th>
					<th width="100">Alumnos</th>
					<th width="100">Eventos</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql = "SELECT * FROM grupos";
					$stmt = $conn->query($sql);
					
					while ($_POST = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$valor = $_POST['ID'];
				?>
						<tr >
							<td><?php echo $_POST["ID"];?></td>
							<td><?php echo "<a href='ListaAlumnos.php?resultado=$valor'>" . $_POST["NOMBRE"] . "</a>"; ?></td>
							<td><?php echo $_POST["ALUMNOS"];?></td>
							<td><?php echo $_POST["EVENTOS"];?></td>
							<td>
								<a href="#" onclick="preguntar(<?php echo  $_POST["ID"]; ?>)">Eliminar</a>
							</td>
						</tr>
						<?php	
					}
					?>
				
			</tbody>
		</table>
	</div>

	<form action="grupos.php" method="POST">
		<nav>
				<a href="registroGrupo.php">Registrar grupo</a></li>

		</nav> 
	</form>
	
	<script type="text/javascript">
		function preguntar(id){
			if(confirm("¿Eliminar " + id + "?")){
				window.location.href = "borrarGrupo.php?id=" + id;
			}
		}
		
	</script>

</body>
</html>
