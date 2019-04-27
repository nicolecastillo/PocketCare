<?php require 'basedatos.php';

header('Location: grupos.php');
$id = isset($_GET["id"]) ? $_GET["id"] : 0;
$sql = "DELETE FROM grupos WHERE ID = {$id}";
$conn->query($sql);
die();