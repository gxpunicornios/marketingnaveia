<?php
include 'db_connection.php';
$output = "";
$db = new DbConnect();
$db->open();
$ip = get_client_ip();
$output = $db->insertUserData($_POST["nome"], $_POST["email"], $_POST["idade"], $_POST["escolaridade"], $ip);
$db->close();

header('Content-Type: application/json');
$result = array('result' => $output);
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