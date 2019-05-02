<?php
require_once '../conexao/conexao.php';
require_once 'inc/funcoes.php'; 

$pagina = 'suspensos';
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

        <?php
        $sql = "SELECT al.*, us.nome FROM alunos AS al
                    INNER JOIN usuarios AS us ON (us.id = al.usuario_id)
                    WHERE status = 0";

        if($_POST && !empty($_POST['busca'])) {
            $busca = trim($_POST['busca']);
            $sql .= " AND us.nome LIKE '%{$busca}%'";
        }

        $sql .= " ORDER BY al.id ASC"; 

        $query = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($query);

        if ($total == 0) {
            ?>
            <div class="col-md-8 offset-md-2 alert alert-warning text-center" role="alert" style="margin-top: 20px; width:100%">
                Não há nenhum aluno suspenso no momento
            </div>
            <?php
        } else {
            ?>
            <div id="list" class="row">
                <div class="table-responsive col-md-12">
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>USUÁRIO_ID</th>
                                <th>NOME</th>
                                <th>CURSO</th>
                                <th>ANO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($res = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $res['id']; ?></td>
                                <td><?php echo $res['usuario_id']; ?></td>
                                <td><?php echo $res['nome']; ?></td>
                                <td><?php echo $res['curso']; ?></td>
                                <td><?php echo $res['ano']; ?></td>
                                <td class="action">
                                    <a class="btn btn-success" href="alunos/suspender.php?id=<?php echo $res['id']; ?>"> Remover Suspensão</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        <?php } ?>
    </div>
</body>
<?php include_once 'inc/js.php'; ?>
</html>