<div class="modal fade" id="pergunta" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="envia_pergunta.php" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Faça sua pergunta!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            </div>


            <div class="modal-body">
                <div class="form-group">
                    <select name="formacao_id" id="formacao_id" class="form-control col-md-4" required>
                        <option value="">Selecione a disciplina</option>
                        <?php
                        $query = mysqli_query($conn, "SELECT id, materia FROM formacao ORDER BY materia ASC");
                        while ($formacao = mysqli_fetch_assoc($query)) {
                            ?>
                            <option value="<?php echo $formacao['id']; ?>"><?php echo $formacao['materia'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </form>
  </div>
</div>

<div class="modal fade" id="respostas" tabindex="-1" role="dialog" aria-labelledby="titleRespostas" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-info mb-3">
                <h5 class="modal-title" id="titleRespostas"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div id="listaRespostas"></div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="responder" tabindex="-1" role="dialog" aria-labelledby="titleResponder" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="envia_resposta.php" method="post">
            <input type="hidden" name="pergunta_id" id="idPergunta" value="<?php echo $res['id'] ?>">
            <input type="hidden" name="formacao_id" id="idFormacao" value="<?php echo $res['fID'] ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleResponder"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <h2 class="text-muted" id="carregaPergunta"></h2>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Sua resposta: </label>
                        <textarea class="form-control" name="descricao" id="descricao" placeholder="Escreva sua resposta aqui"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="envia_pergunta.php" method="post">
            <input type="hidden" name="pergunta_id" id="perguntaId" value="<?php echo $res['id'] ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Pergunta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <div id="carregaEdicao"></div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" name="novoDescricao" id="descricao"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Excluir Pergunta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esta pergunta? Todas as respostas associadas à ela também serão excluídas. 
            </div>
            <div class="modal-footer text-white">
                <a id="confirm" class="btn btn-danger" href="#">Sim</a>
                <a id="cancel" class="btn btn-success" data-dismiss="modal">N&atilde;o</a>
            </div>
        </div>
    </div>
</div>