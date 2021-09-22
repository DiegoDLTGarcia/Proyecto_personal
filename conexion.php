<?php
$host='localhost';
$user='root';
$password='root';
$db='proyecto_personal';

$conection= @mysqli_connect($host,$user,$password,$db);
//mysqli_close($conection);
if(!$conection){
    echo "Error en la conexion!";
}

?>