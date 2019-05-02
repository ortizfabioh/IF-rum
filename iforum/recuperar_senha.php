<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFórum</title>

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <a href="index.php"><img src="img/iforum.png" height="150px" width="250px" alt=""></a>       
    </header>
    <div id="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Enviar email para recuperação de senha</h3>
                    </div>
                    <div class="panel-body">
                        <form action="gera_hash.php" accept-charset="UTF-8" role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="recuperacao_email" type="text">
                                </div>
                                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Enviar">
                            </fieldset>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>