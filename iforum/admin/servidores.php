<?php
require_once '../conexao/conexao.php';
require_once 'inc/funcoes.php'; 

$pagina = 'servidores'; 
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
                            <th>SIAPE</th>
                            <th>ADMINISTRADOR</th>
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
                                    
                        $sql = "SELECT s.*, us.nome, us.email, us.siape, us.admin FROM servidores AS s
                                    INNER JOIN usuarios AS us ON (us.id = s.usuario_id)
                                    WHERE us.tipo_usuario = 'servidor'";
                        if($_POST && !empty($_POST['busca'])) {
                            $busca = trim($_POST['busca']);
                            $sql .= " AND us.nome LIKE '%{$busca}%'";
                        }
                        $sql .= " ORDER BY s.id ASC";  
                        $sql .= " LIMIT $inicio, $total_registro_exibir"; 

                        $query = mysqli_query($conn, $sql);

                        while($result = mysqli_fetch_assoc($query)) {
                            $admin = ($result['admin'] == 1) ? 'SIM' : 'NÃO'; 
                        ?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><?php echo $result['usuario_id']; ?></td>
                            <td><?php echo $result['nome']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $result['siape']; ?></td>
                            <td><?php echo $admin; ?></td>
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