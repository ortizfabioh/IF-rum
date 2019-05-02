<?php
require_once 'conexao/conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFórum</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <a href="index.php"><img src="img/iforum.png" alt="" height="150px" width="250px"></a>   
    </header>
    <div id="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Entrar</h3>
                    </div>
                    <div class="panel-body">
                        <form action="login.php" method="post" accept-charset="UTF-8" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password">
                                </div>
                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="lembrar"> Lembrar-me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="checkbox txtDireita">
                                        <label>
                                            <a href="recuperar_senha.php">Esqueci minha senha</a>
                                        </label>
                                    </div>
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                            </fieldset>
                        </form>
                    </div>             
                </div>
                <button class="btn btn-lg btn-primary btn-block" onclick="location.href='cadastro.php';">Cadastre-se</button>
            </div>
        </div>
    </div>   
</body>
</html>