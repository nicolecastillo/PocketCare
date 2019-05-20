<?php

require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$para = $_POST['to'];
$asunto = $_POST['asunto'];

 
$m = new PHPMailer;

$m->isSMTP();
$m->SMTPAuth = true;

$m->Host = "smtp.gmail.com";
$m->Username = "PocketCareSA@gmail.com"; 
$m->Password = "cuidar123";
$m->SMTPSecure = "tls";
$m->Port = "587";

$m->SMTPOptions = array(
	'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	)
);

$m->isHTML();


$m->Subject = $asunto;
$m->Body = '<h2>Hola, se ha realizado una modificacion en el calendario de PocketCare. <br>Visitar PocketCare para checar los cambios.</h2>';

$m->FromName = "PocketCare";

$m->addAddress($para, 'Usuario');

if($m->send()){?>
	<script type="text/javascript">
		alert("Enviado...");
		window.close();;
	</script>
<?php }else{ ?>
	<script type="text/javascript">
		alert(<?php echo $m->ErrorInfo; ?>);
		window.close();
	</script>
<?php }

?>	
