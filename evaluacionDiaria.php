<?php
  require 'basedatos.php';
	$message = '';
  $db = mysqli_connect("localhost","root","","bd_PocketCare");

  $ID = $_GET['identificador'];
  $stmt1 = $conn->query("SELECT nombre FROM alumnos WHERE id = '$ID'");
	$nombre = $stmt1->fetch(PDO::FETCH_ASSOC);
  $stmt2 = $conn->query("SELECT nombre2 FROM alumnos WHERE id = '$ID'");
	$nombre2 = $stmt2->fetch(PDO::FETCH_ASSOC);
  $stmt3 = $conn->query("SELECT apellido FROM alumnos WHERE id = '$ID'");
	$apellido = $stmt3->fetch(PDO::FETCH_ASSOC);
  $stmt4 = $conn->query("SELECT apellido2 FROM alumnos WHERE id = '$ID'");
	$apellido2 = $stmt4->fetch(PDO::FETCH_ASSOC);


	$sql = "SELECT imagen FROM alumnos WHERE id =  '$ID'";
	$sth = $db->query($sql);
	$imagen=mysqli_fetch_array($sth);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Evaluacion Diaria</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}

		/* The Modal (background) */
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		  background-color: #fefefe;
		  margin: auto;
		  padding: 20px;
		  border: 1px solid #888;
		  width: 80%;
		}

		/* The Close Button */
		.close {
		  color: #aaaaaa;
		  float: right;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: #000;
		  text-decoration: none;
		  cursor: pointer;
		}
		</style>
</head>

<body>
	<?php require 'partials/header.php'?>

<!--	<a href="index.php" ><img src="images/logo_1.png" alt="" /></a>   -->
	<h1>
  <?php
      echo $nombre["nombre"];
      echo " ";
      echo $nombre2["nombre2"];
      echo " ";
      echo $apellido["apellido"];
      echo " ";
      echo $apellido2["apellido2"];
    ?>
  </h1>
  <br>
  <?php echo '<br><img src= "data:image/jpeg;base64,'.base64_encode( $imagen['imagen'] ).' " width = "10%" heigth="10%"/>'; ?>
  <br><br><br>
  Introduzca evaluación:

  <form method="post">

        <textarea cols="70" rows="8" name="eval" type="text" ></textarea>
        <br>


        <?php
          if (!isset($_POST['eval'])){
               $_POST['eval'] = "No hay evaluación";
          }
              $texto = $_POST['eval'];
              $sql = ("UPDATE alumnos SET EVALUACIONDIARIA='$texto' WHERE ID='$ID'");
              $stmt = $conn->prepare($sql);
              if($stmt->execute()){
                  $message ='La evaluación se ha subido exitosamente';

              }else{
                  $message = 'Error al subir la evaluación';
              }

        ?>
        <form action="evaluacionDiaria.php" method="get" >
          <input  type="submit" value="Subir evaluación" name="submit">
       </form>

       <?php
             if(isset($_POST['submit'])){
                 header("Location: grupos.php");
             }
        ?>
	  <br><input type="submit" value="Regresar" onclick="location='grupos.php'">

    </form>
  </body>
  </html>
