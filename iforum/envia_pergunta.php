<?php
require_once 'conexao/conexao.php';
session_start();
$usuario_id = $_SESSION['usuario']['id'];

$aspas = array("'", '"');

if(!empty($_POST['pergunta_id'])) {
    $id = $_POST['pergunta_id'];
    $titulo = $_POST['novoTitulo'];
    $formacao_id = $_POST['novoFormacao_id'];
    $descricao = strip_tags($_POST['novoDescricao'], "<strong><em>");
    
    $descricao = str_replace($aspas, "", $descricao);
    
    $sql = "UPDATE perguntas SET titulo = '{$titulo}', descricao = '{$descricao}', usuario_id = '{$usuario_id}', formacao_id = '{$formacao_id}' WHERE id = {$id}";
} else {
    $titulo = $_POST['titulo'];
    $formacao_id = $_POST['formacao_id'];
    $descricao = strip_tags($_POST['descricao'], "<strong><em>");

    $descricao = str_replace($aspas, "", $descricao);

    $sql = "INSERT INTO perguntas (titulo, descricao, usuario_id, formacao_id) VALUES ('{$titulo}', '{$descricao}', '{$usuario_id}', '{$formacao_id}')";
}

$query = mysqli_query($conn, $sql);
if(!$query) {
    header("Location: home.php?erro");
} else {
    header("Location: home.php?sucesso");
}
?>
