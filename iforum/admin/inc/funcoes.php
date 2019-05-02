<?php
function contaPaginacao ($conn, $table, $total_registro_exibir) {
    $query = mysqli_query($conn, "SELECT COUNT(id) AS totalRegistros FROM $table");
    $res = mysqli_fetch_assoc($query);

    $totalRegistros = $res['totalRegistros'];
    $totalPaginas = ceil($totalRegistros / $total_registro_exibir);
    $max_botoes = $totalPaginas-1;

    $arr = array(
        'totalRegistros' => $totalRegistros,
        'totalPaginas' => $totalPaginas,
        'max_botoes' => $max_botoes,
    );
    return $arr;
}
?>