<?php
require_once '../conexao/conexao.php';

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
} else {
    die("<script>alert('Você não forneceu um parametro válido!');location.href='../home.php';</script>");
}

if(!empty($_POST)) {
    $nome = trim(addslashes($_POST['novoNome']));
    $email = trim(addslashes($_POST['novoEmail']));
    
    $sql = "UPDATE usuarios SET nome = '{$nome}', email = '{$email}'";

    if(!empty($_POST['novoSenha'])) {
        $senha = md5(trim(addslashes($_POST['novoSenha'])));
        $sql .= ", senha = '{$senha}'";
    }
    $sql .= " WHERE id = {$id}";

    $query = mysqli_query($conn, $sql);

    if($query) {
        header('Location: ../home.php?sucesso');
    } else {
        header('Location: ../home.php?erro');
    }
}
?>