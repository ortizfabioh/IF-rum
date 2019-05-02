<?php
$anterior = $pg - 1;
$proximo = $pg + 1;
?>
<div id="bottom" class="row">
    <div class="col-md-12">
        <ul class="pagination">
        <?php
        if($anterior == 0) {
        ?>
            <li class="disabled"><a href="#">&lt; Anterior</a></li>
            <?php } else { ?>
                <li><a href="?pg=<?php echo $anterior; ?>">&lt; Anterior</a></li>
            <?php } ?>
        
        <?php     
          for ($i=1;$i<=$paginacao['totalPaginas'];$i++) {
            if ($i < ($pg-$paginacao['max_botoes']) AND $i == 1) {
        ?>
                <li><a href="?pg=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php     
			}
			
			if ($i >= ($pg-$paginacao['max_botoes']) AND $i <= ($pg+$paginacao['max_botoes'])) {
                if ($i == $pg) {
        ?>
                    <li class="active"><a href="?pg=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
				} else {
        ?>
					<li><a href="?pg=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
				}
			}
			
			if ($i > ($pg+$paginacao['max_botoes']) AND $i == $paginacao['totalPaginas']) {
        ?>
				<li><a href="?pg=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
			}
		}
        ?>
        <?php
        if($pg < $paginacao['totalPaginas']) {
        ?>
            <li class="next"><a href="?pg=<?php echo $proximo; ?>" rel="next">Próximo &gt;</a></li>
        <?php } else { ?>
            <li class="disabled next"><a href="#" rel="next">Próximo &gt;</a></li>
        <?php } ?>
        </ul>
    </div>
</div>
