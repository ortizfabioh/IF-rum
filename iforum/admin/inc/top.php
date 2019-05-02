<div id="top" class="row">
    <div class="col-md-3">
        <h2><?php echo ucfirst($pagina); ?></h2>
    </div>
    <?php if($pagina != 'perguntas') { ?>
        <div class="col-md-6">
            <form action="<?php echo $pagina; ?>.php" method="post">
                <div class="input-group h2">
                    <input type="text" id="busca" name="busca" class="form-control" placeholder="Buscar <?php echo $pagina; ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-info">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    <?php } ?>
</div>