<?php
require_once 'conexao/conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IFórum</title>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body class="register">
    <header>
        <a href="index.php"><img src="img/iforum.png" height="150px" width="250px" alt=""></a>
    </header>

    <div id="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cadastro</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" action="cadastrar.php" method="post" novalidate>
                            <fieldset>
                                <div class=form-group>
                                    <input type="text" name="nome" class="form-control input-underline " placeholder="Nome Completo" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha_confere" class="form-control" placeholder="Confirmar Senha" required>
                                </div>

                                <div class="form-group">
                                    <label for="tipo_usuario">Você é?</label>
                                    <div class="form-group">
                                        <input type="radio" name="tipo_usuario" id="tipo_usuario_aluno" class="tipo_usuario" value="aluno"> Aluno
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="tipo_usuario" id="tipo_usuario_professor" class="tipo_usuario" value="professor"> Professor
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="tipo_usuario" id="tipo_usuario_servidor" class="tipo_usuario" value="servidor"> Servidor
                                    </div>
                                </div>

                                <div id="alunos">
                                    <div class="form-group">
                                        <div class="dropdown">
                                            <select name="curso" id="curso" class="form-control" required>
                                                <option selected="selected">Escolha um curso</option>
                                                <option value="informatica">Informática</option>
                                                <option value="edificacoes">Edificações</option>
                                                <option value="quimica">Química</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=form-group>
                                        <input type="number" name="ano" id="ano" min="1" max="4" class="form-control input-underline" placeholder="Ano" required>
                                    </div>
                                    <div class=form-group>
                                        <input type="number" maxlength="10" min="0" max="9999999999" name="ra" id="ra" class="form-control input-underline" placeholder="RA (Registro Acadêmico)" required>
                                    </div>
                                </div>

                                <div id="professores">
                                    <div class=form-group>
                                        <select name="formacao_id" id="formacao_id" class="form-control" required>
                                            <option selected="selected">Escolha sua formação</option>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM formacao ORDER BY materia ASC");
                                            while($formacao = mysqli_fetch_assoc($query)) {
                                                ?>
                                                <option value="<?php echo $formacao['id']; ?>"><?php echo $formacao['materia']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div id="servidores">
                                    <div class=form-group>
                                        <input type="number" maxlength="7" min="0" max="9999999" name="siape" class="form-control input-underline" placeholder="SIAPE" required>
                                    </div>
                                </div>

                                <button type="submit" onclick=mostrarTermos() class="btn btn-success btn-outline btn-md btn-rounded">Confirmar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function(){
        $('.tipo_usuario').click(function() {
            var selValue = $('.tipo_usuario:checked').val()

            if(selValue == 'aluno') {
                $('#alunos').css({display: 'block'});  
                $('#professores').css({display: 'none'});
                $('#servidores').css({display: 'none'});
            }

            if(selValue == 'professor') {
                $('#alunos').css({display: 'none'});
                $('#professores').css({display: 'block'});
                $('#servidores').css({display: 'block'});
            }

            if(selValue == 'servidor') {
                $('#alunos').css({display: 'none'});
                $('#professores').css({display: 'none'});
                $('#servidores').css({display: 'block'});
            }
        });
    });

    function mostrarTermos() {
        alert('Termos de uso do IFórum\nOlá usuário, seja bem-vindo ao IFórum.\nEsta página contém regras para o uso adequado do site e informações sobre a plataforma.\n 1. Poderão ser realizadas perguntas sobre diversos assuntos e temas;\n2. As respostas poderão ser realizadas por todos os usuários;\n3. Perguntas e/ou respostas com conteúdo ofensivo, palavrões ou usuários com comportamento inadequado poderão ser reportados para os administradores do fórum através do email: iforum.ifpr@gmail.com;\n4. Alunos que obtiverem grandes números de reclamações, podem ter seu acesso suspenso e será notificado pela equipe IFórum;\n5. Após respondida alguma pergunta, os usuários não poderão alterá-la ou excluí-la, portanto, antes de responder certifique-se que sua resposta não inflija nenhum dos termos de uso do site;\n6. O fórum disponibiliza diversos emails de professores para contato. Para encontrar a lista completa, acesse: www.umuarama.ifpr.edu.br/menu-institucional/corpo-docente/\n7. As matérias voltadas para áreas especificas, estão todas classificadas com o nome do curso. Exemplo: Banco de dados, programação, etc. (Informática)\n\nPara ler estes termos novamente, acesse pelo link no rodapé da página.');
    }
</script>
</html>