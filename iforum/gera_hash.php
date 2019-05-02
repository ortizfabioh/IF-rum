<?php
if (!empty($_POST)) {
    require_once 'conexao/conexao.php';

    $email = trim(addslashes($_POST['recuperacao_email']));

    $verificarEmail = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '{$email}'");

    if(mysqli_num_rows($verificarEmail) == 1 ) {
        $hash = hash('sha256', rand(rand(0, 20), 100));
        
        $update = mysqli_query($conn, "UPDATE usuarios SET token = '{$hash}' WHERE email = '{$email}'");

        header("Location: esqueci_senha.php?hash=$hash");
    } else {
        die("<script>alert('Este E-mail não está cadastrado!');location.href='index.php';</script>");    
    }
}
?>