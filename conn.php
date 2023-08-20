<?php
$host = 'dtscmexico.com';
$username = 'mitorneo_mktpulse';
$password = 'marketpulse123';
$dbname = 'mitorneo_marketpulse';

$conn = new mysqli($host,$username, $password,$dbname);

if($conn->connect_error)
{
    die("Conexion fallida: ".$conn->connect_error);
}



//$conn->close();