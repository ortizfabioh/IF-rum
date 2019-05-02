<?php
require_once '../conexao/conexao.php';

$perguntaId = $_GET['id'];

$sql = "SELECT r.descricao, p.descricao AS pergunta, u.nome, u.tipo_usuario FROM respostas AS r
                INNER JOIN perguntas AS p ON (p.id = r.pergunta_id)
                INNER JOIN usuarios AS u ON (u.id = r.usuario_id)
                INNER JOIN formacao AS f ON (f.id = r.formacao_id)
                WHERE r.pergunta_id = {$perguntaId}";

$query = mysqli_query($conn, $sql);

while($res = mysqli_fetch_assoc($query)) {
    ?>
    <blockquote class="blockquote">
        <p class="mb-0"><?php echo $res['descricao']?></p>
        <div class="blockquote-footer"><?php echo $res['nome']?><cite title="Source Title">(<?php echo $res['tipo_usuario']?>)</cite></div>
    </blockquote>
    <hr>
<?php } ?>