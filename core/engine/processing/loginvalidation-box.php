<?php
session_start();
function gets($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}
require ('../../dbjoin.php');
$_SESSION["permission"] = "";
$_SESSION["name"] = "";
$nombre = gets("nombre");
$pass = gets("pass");
$ask = "SELECT * FROM cliente WHERE nombre = '$nombre' and password = '$pass' ;";
$procesado = mysqli_query( $handshake, $ask);
mysqli_close($handshake);
if (mysqli_num_rows($procesado)>0){
	$_SESSION["name"] = $nombre;
	while ($row = mysqli_fetch_array($procesado)) {
			$_SESSION["permission"] = ($row['rango']);
			header('Location: ../../frontend.php');
			die();
		}
}
header('Location: ../../authentication-login-box.php?failed=1');
exit;
?>