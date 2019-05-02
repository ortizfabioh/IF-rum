<?php
session_start();
if(!$_SESSION) {
    die("<script>alert('Você não se logou em uma conta! Pare de tentar entrar pela URL'); history.back();</script>");
}

$usuario = $_SESSION['usuario']['id'];

require_once 'conexao/conexao.php';

$toggle = (!isset($_GET['professores'])) ? "?professores" : "";
$tela = (isset($_GET['professores'])) ? "Perguntas" : "Professores";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFórum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <?php
    include_once 'funcoes/modal.php';
    include_once 'inc/tinymce.php';
    ?>
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color:#8cc541;">
            <a class="navbar-brand nav-link" href="home.php"><img src="img/iforum.png" height="60px" width="100px"> <span class="sr-only">(current)</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse sticky-top" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <a href="home.php<?php echo $toggle; ?>" class="nav-link" style="color:#fff;">Ver <?php echo $tela; ?></a>
                    <?php if(!isset($_GET['professores'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#fff;">
                            Matérias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="home.php">Todas as matérias</a>
                            <?php
                            $formacao_query = mysqli_query($conn, "SELECT id, materia FROM formacao ORDER BY materia ASC");
                            while ($formacao = mysqli_fetch_assoc($formacao_query)) { 
                            ?>
                                <a class="dropdown-item" href="home.php?idM=<?php echo $formacao['id'] ?>"><?php echo $formacao['materia'] ?></a>
                            <?php } ?>
                        </div>
                    </li>
                    <?php } ?>
                </ul>

                <form class="form-inline my-4 my-lg-0" method="post">
                    <div class="form-group ">
                        <input type="text" name="busca" id="busca" class="form-control" placeholder="Pesquisar" aria-label="" aria-describedby="basic-addon1">
                        <div class="form-group-prepend">
                            <button class="busca btn btn-outline-info form-control" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <?php if(!isset($_GET['professores'])) { ?>
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-info my-6 my-sm-0" data-toggle="modal" data-target="#pergunta"> Faça a sua pergunta</button>
                        </div>
                    <?php } ?>
                </form>
                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="perfilDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#000;">
                            <?php echo $_SESSION['usuario']['nome']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="perfilDropdown">
                            <a class="dropdown-item" href="home.php?edit">Editar Perfil</a>
                            <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container-fluid conteudo">
        <?php 
        if(isset($_GET['sucesso']) || isset($_GET['erro'])) { 
            $classe = (isset($_GET['sucesso'])) ? 'success' : 'danger';
            $texto = (isset($_GET['sucesso'])) ? 'SUCESSO: ' : 'ERRO: ';
            $msg = (isset($_GET['sucesso'])) ? 'Operação executada com sucesso' : 'Houve um erro de execução';
            ?>
            <div class="row" style="margin-top: 25px;">
                <div class="alert alert-<?php echo $classe?> alert-dismissible col-md-9">
                    <strong><?php echo $texto?></strong> <?php echo $msg?>
                    <button class="close" data-dismiss="alert" onclick="location.href='home.php'">&times;</button>
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-md-9">
            <?php if(isset($_GET['edit'])) { ?>
                <div class="row edicao">
                    <?php
                    $id = $_SESSION['usuario']['id'];

                    $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = {$id}");
                    $res = mysqli_fetch_assoc($query);
                    ?>

                    <form action="funcoes/edit.php" method="post" class="col-md-9">
                        <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
                        
                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="nome" name="novoNome" value="<?php echo $res['nome'] ?>" placeholder="Nome">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-12">
                                <input type="email" class="form-control" id="email" name="novoEmail" value="<?php echo $res['email'] ?>" placeholder="E-mail">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="senha" class="col-md-2 control-label">Senha</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="senha" name="novoSenha" placeholder="Senha">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <button class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } elseif(!isset($_GET['professores'])) { ?>
                <div class="row perguntas">
                    <?php 
                    $lista = "SELECT p.id, p.titulo, p.descricao, f.id AS fID, f.materia, e.eixo, u.nome, u.id AS uID FROM perguntas AS p
                                        INNER JOIN formacao AS f ON (p.formacao_id = f.id)
                                        INNER JOIN eixos AS e ON (f.eixo_id = e.id)
                                        INNER JOIN usuarios AS u ON (p.usuario_id = u.id)";

                    if (isset($_GET['idM']) && !empty($_GET['idM'])) {
                        $idMateria = $_GET['idM'];
                        $lista .= " WHERE p.formacao_id = {$idMateria}";
                    }
                    if ($_POST && !empty($_POST['busca'])) {
                        $busca = trim($_POST['busca']);
                        $lista .= " WHERE p.titulo LIKE '%{$busca}%'";
                        $lista .= " OR p.descricao LIKE '%{$busca}%'";
                    }

                    $lista .= " ORDER BY p.id DESC";

                    $lista_query = mysqli_query($conn, $lista);                    
                    $total = mysqli_num_rows($lista_query);

                    if ($total == 0) {
                    ?>
                        <div class="col-md-8 offset-md-2 alert alert-warning text-center" role="alert">
                            Nenhum resultado foi encontrado para esta busca!
                        </div>
                    <?php 
                    } else {
                        while ($res = mysqli_fetch_assoc($lista_query)) {
                            $sql_count = "SELECT COUNT(id) as total FROM respostas WHERE pergunta_id = {$res['id']}";
                            $lista_count = mysqli_query($conn, $sql_count);
                            $res_total = mysqli_fetch_assoc($lista_count);
                            ?>                
                            <div class="col-md-6">
                                <div class="card perguntas">
                                    <div class="card-header">
                                        <h4><?php echo $res['materia'] ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $res['titulo'] ?></h6>
                                        <p class="card-text">
                                            <?php echo $res['descricao'] ?>
                                        </p>
                                        <p><small class="text-muted">Postado por: <?php echo $res['nome'] ?></small></p>

                                        <div class="btn-group">
                                            <a id="pergunta_<?php echo $res['id']; ?>" 
                                                class="btn btn-sm btn-primary card-link text-white"  
                                                data-registro="<?php echo $res['id']; ?>"
                                                data-formacao="<?php echo $res['fID']; ?>"
                                                data-href="funcoes/pergunta.php?id=<?php echo $res['id']; ?>" 
                                                data-toggle="modal" 
                                                data-target="#responder">
                                                Responder
                                            </a>  

                                            <a id="resposta_<?php echo $res['id']; ?>" 
                                                class="btn btn-sm btn-warning card-link text-white"  
                                                data-registro="<?php echo $res['id']; ?>"
                                                data-pergunta="<?php echo $res['descricao']; ?>"
                                                data-href="funcoes/respostas.php?id=<?php echo $res['id']; ?>" 
                                                data-toggle="modal" 
                                                data-target="#respostas">
                                                Respostas
                                            </a>  
                                            
                                            <a href="home.php?idM=<?php echo $res['fID'] ?>" class="btn btn-sm btn-success card-link">Mais sobre <?php echo $res['materia'] ?></a>

                                            <?php if ($res['uID'] == $usuario) { ?>
                                                <a id="edit_<?php echo $res['id']; ?>"
                                                    class="btn btn-sm btn-info card-link text-white"  
                                                    data-registro="<?php echo $res['id']; ?>"
                                                    data-href="funcoes/pergunta.php?edit&id=<?php echo $res['id']; ?>"
                                                    data-toggle="modal" 
                                                    data-target="#editar">
                                                    Editar
                                                </a>

                                                <a id="delete_<?php echo $res['id']; ?>"
                                                    class="btn btn-sm btn-danger card-link text-white"  
                                                    data-registro="<?php echo $res['id']; ?>"
                                                    data-href="funcoes/pergunta.php?delete&id=<?php echo $res['id']; ?>"
                                                    data-toggle="modal" 
                                                    data-target="#excluir">
                                                    Excluir
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <?php
                                        if ($res_total['total'] > 1) {
                                            $frase = "$res_total[total] respostas para esta pergunta";
                                        } else {
                                            $frase = "$res_total[total] resposta para esta pergunta";
                                        }
                                        if ($res_total['total'] == 0) {
                                            $frase = 'Nenhuma resposta';
                                        }
                                        ?>
                                        <small class="text-muted"><?php echo $frase ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        }
                    }
                    ?>
                </div>
            <?php } else { ?>
                <div class="row professores">
                    <?php
                    $lista = "SELECT  p.id AS pID, u.id, u.email, u.nome, f.id AS fID, f.materia FROM professores AS p
                                        INNER JOIN usuarios AS u ON (p.usuario_id = u.id)
                                        INNER JOIN formacao AS f ON (p.formacao_id = f.id)";
                    if ($_POST && !empty($_POST['busca'])) {
                        $busca = trim($_POST['busca']);
                        $lista .= " WHERE u.nome LIKE '%{$busca}%'";
                    }

                    $lista .= " ORDER BY u.nome ASC";

                    $lista_query = mysqli_query($conn, $lista);                    
                    $total = mysqli_num_rows($lista_query);

                    if ($total == 0) {
                        ?>
                        <div class="col-md-8 offset-md-2 alert alert-warning text-center" role="alert">
                            Nenhum resultado foi encontrado para esta busca!
                        </div>
                        <?php 
                    } else {
                        while ($res = mysqli_fetch_assoc($lista_query)) {
                            ?>                
                            <div class="col-md-6">
                                <div class="card perguntas">
                                    <h4 class="card-header">
                                        <?php echo $res['nome'] ?>
                                    </h4>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $res['materia'] ?></h6>
                                        <p class="card-text">
                                            <?php echo $res['email'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        }
                    }
                    ?>
                </div>
            <?php } ?>
            </div>
            <div class="bar col-md-3 bg-white">
                <b> Sites Relacionados: </b>
                <ul>
                    <li><a href="http://www.ifpr.edu.br/" target="_blank"> IFPR - Instituto Federal do Paraná </a></li>
                    <br/>
                    <li><a href="https://sipac.ifpr.edu.br/sigaa/logar.do?dispatch=logOn" target="_blank"> SIGAA - Sistema Integrado de Gestão de Atividades Acadêmicas </a></li>
                    <br/>
                    <li><a href="https://sigaa.ifpr.edu.br/sigaa/login_karavellas.jsp" target="_blank"> Karavellas </a></li>
                    <br/>
                    <li><a href="https://glpi.ifpr.edu.br/" target="_blank"> Help Desk </a></li>
                    <br/>
                    <li><a href="https://sei.ifpr.edu.br/" target="_blank"> SEI - Sistema Eletrônico de Informações </a></li>
                    <br/>
                    <li><a href="http://lattes.cnpq.br/" target="_blank"> Plataforma Lattes </a></li>
                </ul>
            </div>
        </div>
    </div>
</body>

<footer>
    <div class="footer">IFórum - Todos os direitos reservados. 2018 - <a href="termos_de_uso.html" target="_blank" style="color:#007FFF">Clique aqui</a> para ler os Termos de uso. </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/modal.js"></script>
</html>