$('#responder').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('registro');
    var fID = button.data('formacao');
    var url = button.data('href');
    
    $('#idPergunta').val(id);
    $('#idFormacao').val(fID);
    
    $.get(url, function (data) {
        $('#carregaPergunta').html(data);
    });
});

$('#respostas').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('registro');
    var url = button.data('href');
    var pergunta = button.data('pergunta');

    $('#titleRespostas').html(pergunta);

    $.get(url, function (data) {
        $('#listaRespostas').html(data);
    });
});

$('#editar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('registro');
    var url = $('#edit_' + id).data('href');

    $('#perguntaId').val(id);

    $.get(url, function (data) {
        $('#carregaEdicao').html(data);
    });
});

$('#excluir').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('registro');
    var deleteUrl = $('#delete_'+id).data('href');
    var modal = $(this);
    
    modal.find('.modal-title').text('Excluir Pergunta');
    modal.find('#confirm').attr('href', deleteUrl);
});