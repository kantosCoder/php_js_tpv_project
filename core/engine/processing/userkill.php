<?php
$id = $_GET["mod"];
$adminsecure = 0;
$onlyuser=false;
require ('../../dbjoin.php');
//check admin
$ask = "SELECT * from cliente where rango ='admin';";
$admincheck = mysqli_query( $handshake, $ask);
mysqli_close($handshake);
while ($row = mysqli_fetch_array($admincheck)) {
				if ($row['rango']=="admin")
					{$adminsecure++;}
				}
require ('../../dbjoin.php');
$ask = "SELECT * from cliente where id_cliente = $id;";
$procesado = mysqli_query( $handshake, $ask);
while ($row = mysqli_fetch_array($procesado)) {
if ($row['rango']=="user")
					{$onlyuser=true;}
}
mysqli_close($handshake);


if($adminsecure>1 || $onlyuser==true){
	require ('../../dbjoin.php');
	if (mysqli_num_rows($procesado)==1){
	$put = "DELETE from cliente where id_cliente= '$id'";
	$procesado = mysqli_query( $handshake, $put);
	mysqli_close($handshake);
	header('Location: ../../userlist.php?done="1"');
	exit;
	}
	else{header('Location: ../../userlist.php?failed="1"');}
}
else{header('Location: ../../userlist.php?lastadmin="1"');}
	