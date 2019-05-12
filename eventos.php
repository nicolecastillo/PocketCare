

<?php 
header('Content-Type: application/json');
require 'basedatos.php';

$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

switch ($accion) {
	case 'agregar':
		$stmt = $conn->prepare("INSERT INTO eventos(title, descripcion, color, textColor, start, end) VALUES(
				:title, :descripcion, :color, :textColor, :start, :end)");

		$respuesta = $stmt->execute(array(
			"title" => $_POST['title'],
			"descripcion" => $_POST['descripcion'],
			"color" => $_POST['color'],
			"textColor" => $_POST['textColor'],
			"start" => $_POST['start'],
			"end" => $_POST['end']
		));

		echo json_encode($respuesta);
		break;

	case 'eliminar':
		$respuesta = false;
		if(isset($_POST['id'])){
			$stmt = $conn->prepare("DELETE FROM eventos WHERE ID = :ID");
			$respuesta = $stmt->execute(array("ID" => $_POST['id']));
		}

		echo json_encode($respuesta);
		break;

	case 'modificar':
		$stmt = $conn->prepare("UPDATE eventos SET
		title = :title,
		descripcion = :descripcion,
		color = :color,
		textColor = :textColor,
		start = :start,
		end = :end
		WHERE ID = :ID
		");

		$respuesta = $stmt->execute(array(
			"ID" => $_POST['id'],
			"title" => $_POST['title'],
			"descripcion" => $_POST['descripcion'],
			"color" => $_POST['color'],
			"textColor" => $_POST['textColor'],
			"start" => $_POST['start'],
			"end" => $_POST['end']
		));

		echo json_encode($respuesta);
		break;

	default:
		$stmt = $conn->prepare("SELECT * FROM eventos");
		$stmt->execute();

		$resultado = $stmt->fetchALL(PDO::FETCH_ASSOC);
		echo json_encode($resultado);
		break;
}


?>

