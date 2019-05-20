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
$m->Username = "PocketCareSA@gmail.com"; //No hagas muchas pruebas el mismo dia ya que puede que te bloqueen la cuenta. Este correo lo cree especialmente para usarla todos.
$m->Password = "cuidar123"; // Intentar no moverle al codigo ya que batalle para funcionara y no se exactamente que hice para que funcionara, pero lo hace
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
