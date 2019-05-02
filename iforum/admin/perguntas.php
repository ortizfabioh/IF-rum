<?php
require_once '../conexao/conexao.php';
require_once 'inc/funcoes.php'; 

$pagina = 'perguntas'; 
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
        <?php include_once 'inc/top.php'; ?>

        <div id="list" class="row">
            <div class="table-responsive col-md-12">
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>MATÉRIA</th>
                            <th>PERGUNTAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                        $sql = "SELECT id AS idFormacao, materia FROM formacao";

                        if($_POST && !empty($_POST['busca'])) {
                            $busca = trim($_POST['busca']);
                            $sql .= " WHERE materia LIKE '%{$busca}%'";
                        }
                        $sql .= " ORDER BY materia ASC"; 

                        $query = mysqli_query($conn, $sql);

                        while($result = mysqli_fetch_assoc($query)) {
                            $sql_count = "SELECT COUNT(id) AS totalPerguntas, formacao_id FROM perguntas WHERE formacao_id = '$result[idFormacao]'";
                            $query_count = mysqli_query($conn, $sql_count);
                            $result_count = mysqli_fetch_assoc($query_count);
                        ?>
                        <tr>
                            <td><?php echo $result['materia']; ?></td>
                            <td><?php echo $result_count['totalPerguntas']; ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                </table>    
            </div>
        </div>
    </div>
</body>
<?php include_once 'inc/js.php'; ?>
</html>