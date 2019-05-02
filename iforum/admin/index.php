<?php
require_once '../conexao/conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFórum - Administração</title>
    <?php include_once 'inc/css.php'; ?>
</head>

<body>
    <?php include_once 'inc/navbar.php'; ?>
    <div id="main" class="container-fluid">
        <h1 class="page-header">Página Principal</h1>
        <p>Olá administrador, seja bem-vindo à administração do sistema.</p>
        <p>Nesta página, você terá acesso aos seguintes relatórios:
            <ul>
                <li>Quantidade de perguntas relacionadas à cada disciplina</li>
                <li>Alunos cadastrados</li>
                <li>Alunos que foram suspensos</li>
                <li>Professores cadastrados</li>
                <li>Servidores cadastrados</li>
            </ul>
        </p>
    </div>
    <?php include_once 'inc/js.php'; ?>
</body>
</html>