<?php
$Server="localhost";
$User="root";
$Password="";
$Db="db_mechgo";

$Conn=mysqli_connect($Server,$User,$Password,$Db);

if(!$Conn)
{
	echo "Connection Failed";
}
?>