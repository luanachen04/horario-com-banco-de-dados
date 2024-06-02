<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$database = "mar de rotas2";

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->connect_error) 
    echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
?>