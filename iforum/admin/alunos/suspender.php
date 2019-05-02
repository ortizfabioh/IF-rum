<?php
require_once '../../conexao/conexao.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    exit('Não foi fornecido um parâmetro válido');
}

$update = mysqli_query($conn, "UPDATE alunos SET status = 1 - status WHERE id = {$id}");

$query = mysqli_query($conn, "SELECT * FROM alunos WHERE id = {$id}");
$status = mysqli_fetch_assoc($query);

if($status['status'] == 0) {
    echo "<script>alert('Aluno suspenso!'); history.back();</script>";
    header('Location: ../alunos.php');
} else {
    echo "<script>alert('Suspensão removida!'); history.back();</script>";
    header('Location: ../suspensos.php');
}
?>