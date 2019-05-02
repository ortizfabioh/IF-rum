<?php
require_once 'conexao/conexao.php';

if(!isset($_GET['hash'])) {
    $email = trim(addslashes($_POST['recuperar_email']));
    $senha = trim(addslashes($_POST['recuperar_senha']));
    $hash = trim($_POST['hash']);

    $verificacao = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '{$email}' AND token = '{$hash}'");
    
    if($verificacao) {
        $senha = md5($senha);

        $query = mysqli_query($conn, "SELECT senha FROM usuarios WHERE email = '{$email}' AND token = '{$hash}'");
        $checar = mysqli_fetch_assoc($query);
        if($checar != $senha) {
            mysqli_query($conn, "UPDATE usuarios SET senha = '{$senha}' WHERE email = '{$email}' AND token = '{$hash}'");
            echo "<script>alert('Senha alterada com sucesso!');location.href='index.php';</script>";
            mysqli_query($conn, "UPDATE usuarios SET token = NULL WHERE token = '{$hash}'");
        } else {
            echo "<script>alert('Sua nova senha não pode ser igual à anterior!');history.back();</script>";
        }
    } else {
        die("<script>alert('Usuário não existe ou dados estão incorretos!');location.href='cadastro.php';</script>");
    } 
} 
?>