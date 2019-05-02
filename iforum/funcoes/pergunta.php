<?php
require_once '../conexao/conexao.php';
$perguntaId = $_GET['id'];

if(isset($_GET['delete'])) {
    $query_resposta = mysqli_query($conn, "DELETE FROM respostas WHERE pergunta_id = {$perguntaId}");
    $query_pergunta = mysqli_query($conn, "DELETE FROM perguntas WHERE id = {$perguntaId}");

    if($query_pergunta || $query_resposta) {
        header('Location: ../home.php?sucesso');
    } else {
        header('Location: ../home.php?erro');
    }
} else if(isset($_GET['edit'])) {
    $q = mysqli_query($conn, "SELECT titulo, descricao, formacao_id FROM perguntas WHERE id = $perguntaId");
    $res = mysqli_fetch_assoc($q);
    ?>
    <div class="form-group">
        <label for="titulo">Disciplina</label>
        <select name="novoFormacao_id" id="formacao_id" class="form-control col-md-4">
            <?php
            $query = mysqli_query($conn, "SELECT id, materia FROM formacao ORDER BY materia ASC");
            while ($formacao = mysqli_fetch_assoc($query)) {
                $selected = ($formacao['id'] == $res['formacao_id']) ? 'selected' : '';
                ?>
                <option value="<?php echo $formacao['id']; ?>" <?php echo $selected?>><?php echo $formacao['materia'] ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="titulo">Título</label>
        <input class="form-control" name="novoTitulo" id="titulo" type="text" value="<?php echo $res['titulo']; ?>" required>
    </div>
    <?php 
} else {
    $sql = "SELECT p.descricao, u.nome FROM perguntas AS p
                    INNER JOIN usuarios AS u ON (p.usuario_id = u.id)
                    WHERE p.id = {$perguntaId}";

    $query = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($query);
    ?>
    <div>
        <span><?php echo $res['descricao'] ?></span>
    </div>
    <br>
    <div>
        <p class="text-muted" style="font-size: 13px">Postado por: <?php echo $res['nome'] ?></p>
    </div>
    <hr>
<?php } ?>