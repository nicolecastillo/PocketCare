<?php

require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$para = $_POST['to'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
 
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
$m->Body = $mensaje;

$m->FromName = "PocketCare";

$m->addAddress($para, 'Usuario');

if($m->send()){?>
	<script type="text/javascript">
		alert("Enviado...");
		window.location.href = "index.php";
	</script>
<?php }else{ ?>
	<script type="text/javascript">
		alert(<?php echo $m->ErrorInfo; ?>);
		window.location.href = "index.php";
	</script>
<?php }

?>	
