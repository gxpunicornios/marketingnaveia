<?php
include 'db_connection.php';
require 'mailer/PHPMailerAutoload.php';

$output = "";
$typeOut = $_POST["ebook"] === "1" ? "ebook" : "register";
$ip = $_POST["ip"];
if(empty($ip)){
    $ip = "UNKNOW";
}
 if (preg_match('/:/',$ip)){
        $ip = convert_ipv6_to_ipv4($ip);
    }
$db = new DbConnect();
$db->open();
$output = $db->insertUserData($_POST["nome"], $_POST["email"], $_POST["idade"], $_POST["escolaridade"],$_POST["interesse"], $ip);

if(($output === 0 || $output === 2) && $_POST["ebook"] === "1"){
    $ebookText = 'Olá '.$_POST["nome"].',
<br><br>
Obrigado por se interessar no "Growth Hacking: o que é e como aplicar na minha estratégia". Tenho certeza de que você vai aprender muito com este material.
No link abaixo, você pode acessar e fazer download do material quando quiser.
<br><br>
https://goo.gl/LmVgRx
<br> <br>
Um abraço,
Equipe Marketing na Veia';
    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail ->CharSet = "UTF-8";
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'carnarvalgs@gmail.com';                 // SMTP username
$mail->Password = 'wsws8443';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noreply@marketingnaveia.com', 'Marketing na Veia - Não Responda');
$mail->addAddress($_POST["email"], $_POST["nome"]);     // Add a recipient
                               // Set email format to HTML

$mail->Subject = 'Aqui está seu Ebook!';
$mail->Body    = $ebookText;
$mail->AltBody = $ebookText;

if(!$mail->send()) {
    $output = $mail->ErrorInfo;
} else {
    $output = 0;
}
}
$db->close();





header('Content-Type: application/json');
$result = array("result" => $output, "type" => $typeOut);
echo json_encode($result);

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    

    if (preg_match('/:/',$ipaddress)){
        $ipaddress = convert_ipv6_to_ipv4($ipaddress);
    }
    return $ipaddress;
}

function convert_ipv6_to_ipv4($ipv6){
    return hexdec(substr($ipv6, 0, 2)). "." . hexdec(substr($ipv6, 2, 2)). "." . hexdec(substr($ipv6, 5, 2)). "." . hexdec(substr($ipv6, 7, 2));
}

?>