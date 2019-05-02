<?php
require_once '../conexao/conexao.php';
require_once 'inc/funcoes.php'; 

$pagina = 'alunos'; 
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
                            <th>ID</th>
                            <th>USUÁRIO_ID</th>
                            <th>NOME</th>
                            <th>E-MAIL</th>
                            <th>CURSO</th>
                            <th>ANO</th>
                            <th>RA</th>
                            <th class="actions">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_registro_exibir = 10; 
                            if (!isset($_GET['pg'])) {
                                $pg = 1;
                            } else {
                                $pg = $_GET['pg'];
                            }
                            $inicio = $pg - 1;
                            $inicio = $inicio * $total_registro_exibir;
                                        
                            $sql = "SELECT al.*, us.nome, us.email, us.ra FROM alunos AS al
                                        INNER JOIN usuarios AS us ON (us.id = al.usuario_id)
                                        WHERE us.tipo_usuario = 'aluno'";
                            if($_POST && !empty($_POST['busca'])) {
                                $busca = trim($_POST['busca']);
                                $sql .= " AND us.nome LIKE '%{$busca}%'";
                            }
                            $sql .= " ORDER BY al.id ASC"; 
                            $sql .= " LIMIT $inicio, $total_registro_exibir"; 

                            $query = mysqli_query($conn, $sql);

                            while($result = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr>
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['usuario_id']; ?></td>
                                <td><?php echo $result['nome']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td><?php echo $result['curso']; ?></td>
                                <td><?php echo $result['ano']; ?></td>
                                <td><?php echo $result['ra']; ?></td>
                                <td class="actions">
                                <?php if($result['status'] == 1) { ?>
                                    <a class="btn btn-danger" href="<?php echo $pagina; ?>/suspender.php?id=<?php echo $result['id']; ?>"> Suspender</a>
                                <?php } else { ?>
                                    <a href="suspensos.php"><h5>Aluno suspenso</h5></a>
                                <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        <?php
        $paginacao = contaPaginacao($conn, $pagina, $total_registro_exibir);
        include_once 'inc/paginacao.php';
        ?>
    </div>
</body>
<?php include_once 'inc/js.php'; ?>
</html>