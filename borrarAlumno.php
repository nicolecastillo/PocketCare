<?php require 'basedatos.php';

header('Location: alumnos.php');
$id = isset($_GET["id"]) ? $_GET["id"] : 0;
$sql = "DELETE FROM alumnos WHERE ID = {$id}";
$conn->query($sql);
die();