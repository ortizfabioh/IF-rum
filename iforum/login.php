<?php
require_once 'conexao/conexao.php';

if ($_POST) {
    if (!empty($_POST['email']) && !empty($_POST['senha'])) {
        $email = trim(addslashes($_POST['email']));
        $senha = md5(trim(addslashes($_POST['senha'])));

        $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '{$email}' AND senha = '{$senha}'");

        if (!$query) {
            die("Falha na consulta a tabela");
        } else {
            $dados = mysqli_fetch_assoc($query);

            unset($dados['senha']);

            if (!$dados) {
                die("<script>alert('Dados incorretos!');history.back();</script>");
            } else {
                session_start();

                $admin = $dados['admin'];
                $idUsuario = $dados['id'];
                $emailUsuario = $dados['email'];
                $tipoUsuario = $dados['tipo_usuario'];
                $nomeUsuario = $dados['nome'];

                switch($tipoUsuario) {
                    case 'aluno': 
                        $tipoUsuario = $tipoUsuario.'s';
                        break;
                    default:
                        $tipoUsuario = $tipoUsuario.'es';
                        break;
                }

                if ($admin == 1) {
                    $admin = true;
                } else {
                    $admin = false;
                }
                $query = mysqli_query($conn, "SELECT * FROM $tipoUsuario WHERE usuario_id = {$idUsuario}");
                $res = mysqli_fetch_assoc($query);
                
                $statusUsuario = $res['status'];

                if($statusUsuario == 1) {
                    $_SESSION = array(
                        'admin' => $admin,
                        'usuario' => array(
                            'id' => $idUsuario,
                            'email' => $emailUsuario,
                            'tipo' => $tipoUsuario,
                            'status' => $statusUsuario,
                            'nome' => $nomeUsuario
                        )
                    );

                    if ($admin) {
                        exit(header("Location: admin/index.php"));
                    } else {
                        exit(header("Location: home.php"));
                    }
                } else {
                    die("<script>alert('Este aluno está suspenso!');location.href='index.php'</script>");
                }
            }
        }
    }
}
?>