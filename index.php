<?php
	session_start();

	require 'basedatos.php';

	if (isset($_SESSION['id_usuario'])) {
		$records = $conn->prepare('SELECT id, tipocuenta, nombreusuario, contrasena FROM cuentas WHERE id = :idusuario');
		$records->bindParam(':idusuario', $_SESSION['id_usuario']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
			$user = $results;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<title>Bienvenido a PocketCare</title>
	<link rel="stylesheet" href="assets/css/main.css" />

	<!-- CALENDARIO PADRES -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calendario</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/moment.min.js"></script>
	<!-- Full Calendar -->
	<link rel="stylesheet" href="css/fullcalendar.min.css">
	<script src="js/fullcalendar.min.js"></script>
	<script src="js/es.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	<script src="js/bootstrap-clockpicker.js"></script>
	<link rel="stylesheet" href="css/bootstrap-clockpicker.css">

</head>
<body>

	<?php if(!empty($user)): ?>
		<?php if($results['tipocuenta'] == 1): ?>
			<body class="homepage is-preload">
			<div id="page-wrapper">

				<!-- Header -->
					<section id="header">

						<!-- Logo -->
							<a href="index.php"><img src="images/logo_1.png" alt="" /></a>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.php">Inicio</a></li>
									<li><a href="calendario.html">Eventos</a></li>
									<li><a href="grupos.php">Grupos</a></li>
									<li><a href="alumnos.php">Alumnos</a></li>
									<li><a href="logout.php">Salir</a></li>
								</ul>
							</nav>

						<!-- Banner -->
							<section id="banner">
								<header>

									<h2>Bienvenido <?= $user['nombreusuario']; ?></h2>
									<p>Has ingresado satisfactoriamente</p>
								</header>
							</section>

						<!-- Intro -->
							<section id="intro" class="container">
								<div class="row">
									<div class="col-4 col-12-medium">
										<section class="first">
											<i class="icon featured fa-cog"></i>
											<header>
												<h2>Ipsum consequat</h2>
											</header>
											<p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
										</section>
									</div>
									<div class="col-4 col-12-medium">
										<section class="middle">
											<i class="icon featured alt fa-flash"></i>
											<header>
												<h2>Magna etiam dolor</h2>
											</header>
											<p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
										</section>
									</div>
									<div class="col-4 col-12-medium">
										<section class="last">
											<i class="icon featured alt2 fa-star"></i>
											<header>
												<h2>Tempus adipiscing</h2>
											</header>
											<p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
										</section>
									</div>
								</div>
								<footer>
									<ul class="actions">
										<li><a href="#" class="button large">Get Started</a></li>
										<li><a href="#" class="button alt large">Learn More</a></li>
									</ul>
								</footer>
							</section>

					</section>

				<!-- Main -->
					<section id="main">
						<div class="container">

		<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">

					<!-- Logo -->
						<a href="index.php"><img src="images/logo_1.png" alt="" /></a>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="index.php">Inicio</a></li>
								<li><a href="calendario.html">Eventos</a></li>
								<li><a href="right-sidebar.html">Grupos</a></li>
								<li><a href="logout.php">Salir</a></li>
								<li><a href="registroAlumno.php">Registrar alumno</a></li>
							</ul>
						</nav>

					<!-- Banner -->
						<section id="banner">
							<header>

								<h2>Bienvenido. <?= $user['nombreusuario']; ?></h2>
								<p>Has ingresado satisfactoriamente</p>
							</header>
						</section>
		</body>
		<?php else: ?>
			<body class="homepage is-preload">
			<div id="page-wrapper">

				<!-- Header -->
					<section id="header">

						<!-- Logo -->
							<a href="index.php"><img src="images/logo_1.png" alt="" /></a>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.php">Inicio</a></li>
									<li><?php echo "<a href='hijo.php?miHijo=$user[nombreusuario]'>" . "Hijo" . "</a>"; ?></li>
									<li><a href="logout.php">Salir</a></li>
								</ul>
							</nav>

						<!-- Banner -->
							<section id="banner">
								<header>
									<h2>Bienvenido <?= $user['nombreusuario']; ?></h2>
									<p>Has ingresado satisfactoriamente</p>
								</header>
							</section>

							<body>

								<div class="container">
									<div class="row">
										<div class="col"></div>
										<div class="col-7"></br></br><div id="Calendario"></div></div>
										<div class="col"></div>
									</div>
								</div>
	
								<script>
								$(document).ready(function(){
										$('#Calendario').fullCalendar({
											header:{
												left:'today,prev,next',
												center:'title',
												right:'month,basicWeek,basicDay,agendaWeek,agendaDay'
											},
											
											dayClick:function(date,jsEvent,view){
												limpiarFormulario();
												$('#txtFecha').val(date.format());
												$("#ModalEventos").modal();
											},
											
											events: 'http://localhost/PocketCare/eventos.php',

											eventClick:function(calEvent,jsEvent,view){
												// H2
												$('#tituloEvento').html(calEvent.title);
												// Mostrar la información del evento en los inputs
												$('#txtDescripcion').val(calEvent.descripcion);
												$('#txtID').val(calEvent.id);
												$('#txtTitulo').val(calEvent.title);
												$('#txtColor').val(calEvent.color);
												FechaHora = calEvent.start._i.split(" ");
												$('#txtFecha').val(FechaHora[0]);
												$("#ModalEventos").modal();
											},
										});
									});
								</script>
								<!-- Modal(Agregar, Modificar, Eliminar) -->
								<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="tituloEvento"></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">

								      	<input type="hidden" id="txtID" name="txtID"/>
								      	<input type="hidden" id="txtFecha" name="txtFecha"/>
										<div class="form-row">
											<div class="form-group col-md-8">
												<label>Título:</label>
												<input type="text" id="txtTitulo" class="form-control" placeholder="Título del evento" readonly/>
											</div>
											<div class="form-group col-md-4">
												<label>Hora del evento: </label>
												<div class="input-group clockpicker" data-autoclose="true">
													<input type="text" id="txtHora" value="10:30" class="form-control" readonly />
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Descripción:</label>
											<textarea id="txtDescripcion" rows="3" class="form-control" readonly></textarea>
										</div>
								      </div>
								    </div>
								  </div>
								</div>

								<script>

								var NuevoEvento;

								function RecolectarDatosGUI(){
									NuevoEvento = {
										id: $('#txtID').val(),
										title: $('#txtTitulo').val(),
										start: $('#txtFecha').val() + " " + $('#txtHora').val(),
										color: $('#txtColor').val(),
										descripcion: $('#txtDescripcion').val(),
										textColor: "#FFFFFF",
										end: $('#txtFecha').val() + " " + $('#txtHora').val()
									};
								}

								</script>
							</body>
		</body> 
	<?php endif; ?>
	<?php else: ?>

		<body class="homepage is-preload">
			<div id="page-wrapper">

				<!-- Header -->
					<section id="header">

						<!-- Logo -->
							<a href="index.php" ><img src="images/lolgo.png" alt="" /></a>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="login.php">Iniciar Sesión</a></li>
									<li><a href="signup.php">Registrarse</a></li>
								</ul>
							</nav>

						<!-- Banner -->


					</section>

			</div>

			<!-- Scripts -->
				<script src="assets/js/jquery.min.js"></script>
				<script src="assets/js/jquery.dropotron.min.js"></script>
				<script src="assets/js/browser.min.js"></script>
				<script src="assets/js/breakpoints.min.js"></script>
				<script src="assets/js/util.js"></script>
				<script src="assets/js/main.js"></script>

		</body>
	<?php endif; ?>

</body>
</html>
