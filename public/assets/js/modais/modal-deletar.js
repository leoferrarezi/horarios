function openDeleteModal(id, url_find, url_dest) {
    // Faz uma requisição AJAX para buscar os dados do registro
    $.ajax({
        url: url_find + id,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Preencher os campos da modal com os dados retornados
            $('#Registro-id').html(id);
            $('#Registro-nome').html(data.nome);
            $('#Registro-siape').html(data.siape);
            $('#Registro-email').html(data.email);
            $('#deletarProfessor').attr('action', url_dest + id)
            // Exibir a modal
            $('#modal-deletar-professor').modal('show');
        },
        error: function() {
            alert('Erro ao buscar dados do registro.');
        }
    });
}