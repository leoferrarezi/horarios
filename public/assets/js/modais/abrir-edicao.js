function openEditModal(id, url_find, url_dest) {
    // Faz uma requisição AJAX para buscar os dados do registro
    $.ajax({
        url: url_find + id,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Preencher os campos da modal com os dados retornados
            $('#edit-nome').val(data.nome);
            $('#edit-siape').val(data.siape);
            $('#edit-email').val(data.email);
            $('#editarProfessor').attr('action', url_dest + id)
            // Exibir a modal
            $('#modal-edit-prof').modal('show');
        },
        error: function() {
            alert('Erro ao buscar dados do registro.');
        }
    });
}