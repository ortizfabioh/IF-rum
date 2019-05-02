<?php
define('DOMINIO_SERVIDOR', 'ifpr.edu.br');

if (!empty($_POST)) {
    require_once 'conexao/conexao.php';

    $nome = trim(addslashes($_POST['nome']));
    $email = trim(addslashes($_POST['email']));
    $senha = trim(addslashes($_POST['senha']));
    $senha_confere = trim(addslashes($_POST['senha_confere']));
    $tipo_usuario = trim($_POST['tipo_usuario']);

    $formacao_id = (!empty($_POST['formacao_id'])) ? trim($_POST['formacao_id']) : NULL;

    $ra = (!empty($_POST['ra'])) ? trim(addslashes($_POST['ra'])) : NULL;
    if($ra != NULL) {
        $type = strval($ra);
        $length = strlen($type);
        if(($length < 10 || $length > 10) || $ra < 0) {
            die("<script>alert('Digite um RA válido');location.href='cadastro.php';</script>");
        }
    }

    $siape = (!empty($_POST['siape'])) ? trim(addslashes($_POST['siape'])) : NULL;
    if($siape != NULL) {
        $type = strval($siape);
        $length = strlen($type);
        if(($length < 7 || $length > 7) || $siape < 0) {
            die("<script>alert('Digite um Siape válido');location.href='cadastro.php';</script>");
        }
    }

    if ($senha != $senha_confere) {
        die("<script>alert('Senhas não conferem!');location.href='cadastro.php';</script>");
    } else {
        $senha = md5($senha);
    }

    $verificarEmail = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '{$email}'");

    if(mysqli_num_rows($verificarEmail) > 0) {
        die("<script>alert('Este E-mail já está cadastrado');location.href='cadastro.php';</script>");    
    } else {
        if ($tipo_usuario != 'aluno') {
            
            $dominio = explode('@', $email);
            $dominio = $dominio[1];

            if ($dominio != DOMINIO_SERVIDOR) {
                exit("<script>alert('Você deve utilizar seu domínio da instituição (@".DOMINIO_SERVIDOR.")!');history.back();</script>");
            } else {
                $qUsuario = mysqli_query($conn, "SELECT id FROM usuarios");
                $qtd = mysqli_num_rows($qUsuario);

                $admin = ($qtd == 0) ? 1 : 0;

                $sql = "INSERT INTO usuarios (nome, email, senha, tipo_usuario, ra, siape, admin) 
                                VALUES ('{$nome}', '{$email}', '{$senha}', '{$tipo_usuario}', NULL, '{$siape}', {$admin})";
                $insere = mysqli_query($conn, $sql);

                if (!$insere) {
                    exit('erro no cadastro de USUARIO');
                } else {
                    $idUsuario = mysqli_insert_id($conn); 
                    if ($tipo_usuario == 'professor') {
                        $query_formacao = mysqli_query($conn, "SELECT * FROM formacao WHERE id = {$formacao_id}");
                        if (!$query_formacao) {
                            die('Erro na consulta a tabela de FORMACAO');
                        } else {
                            $formacao = mysqli_fetch_assoc($query_formacao);
                            $eixo_id = $formacao['eixo_id'];
                        }

                        $sql_professor = "INSERT INTO professores (usuario_id, eixo_id, formacao_id, status) 
                                                VALUES ('{$idUsuario}', '{$eixo_id}', '{$formacao_id}', 1)";
                        $insere = mysqli_query($conn, $sql_professor);

                        if (!$insere) {
                            exit('erro no cadastro de PROFESSOR');
                        } else {
                            header("Location: index.php");
                            echo "<script>alert('Professor cadastrado com sucesso!');history.back();</script>";
                        }
                    }

                    if ($tipo_usuario == 'servidor') {
                        $sql_servidor = "INSERT INTO servidores (usuario_id, status) 
                                            VALUES ('{$idUsuario}', 1)";
                        $insere = mysqli_query($conn, $sql_servidor);

                        if (!$insere) {
                            exit('erro no cadastro de SERVIDOR');
                        } else {
                            header("Location: index.php");
                            echo "<script>alert('Servidor cadastrado com sucesso!');</script>";
                        }
                    }
                }
            }
        } else {
            $curso = $_POST['curso'];
            $ano = trim(addslashes($_POST['ano']));

            if($ano < 1 || $ano > 4) {
                echo "<script>alert('Digite o ano do curso entre 1° e 4° ano');history.back();</script>";
            }

            $sql = "INSERT INTO usuarios (nome, email, senha, tipo_usuario, ra, siape, admin) 
                            VALUES ('{$nome}', '{$email}', '{$senha}', '{$tipo_usuario}', '{$ra}', NULL, 0)";
            $insere = mysqli_query($conn, $sql);

            if (!$insere) {
                exit('erro no cadastro de USUARIO');
            } else {
                $idUsuario = mysqli_insert_id($conn);

                $sql_aluno = "INSERT INTO  alunos (usuario_id, curso, ano, status) 
                                    VALUES ('{$idUsuario}', '{$curso}', '{$ano}', 1)";

                $insere = mysqli_query($conn, $sql_aluno);

                if (!$insere) {
                    exit('erro no cadastro de ALUNO');
                } else {
                    header("Location: index.php");
                    echo "<script>alert('Aluno cadastrado com sucesso!');</script>";
                }
            }
        }
    }
}
?>