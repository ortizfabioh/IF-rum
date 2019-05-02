<?php
require_once 'conexao/conexao.php';
session_start();

$usuario_id = $_SESSION['usuario']['id'];
$pergunta_id = $_POST['pergunta_id'];
$formacao_id = $_POST['formacao_id'];
$descricao = strip_tags($_POST['descricao'], "<strong><em>");

$aspas = array("'", '"');
$descricao = str_replace($aspas, "", $descricao);
    
$sql = "INSERT INTO respostas (descricao, usuario_id, pergunta_id, formacao_id) VALUES ('{$descricao}', '{$usuario_id}', '{$pergunta_id}', '{$formacao_id}')";

$query = mysqli_query($conn, $sql);
if(!$query) {
    header("Location: home.php?erro");
} else {
    header("Location: home.php?sucesso");
}
?>