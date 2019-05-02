<?php
define('BASE_URL', 'iforum/');

$host = "localhost";
$user = "root";
$pass = "";
$db = "iforum";

$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn, 'utf8');

if(mysqli_connect_errno()){
    die("Falha na conexão com Banco de Dados. Erro: " .mysqli_connect_errno());
}
?>
