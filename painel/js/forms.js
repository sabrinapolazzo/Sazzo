$(function() {

    $('#btn-specials-plus').click(function() {
        // Cria uma nova div para o novo filho
        var newChild = $('<div class="box-specials w-90 bg-terciary-color mb-5 p-3">' +
            '<button class="btn btn-specials-minus" style="width: 30px;" class="btn specials-minus bg-secundary-color text-light mb-3 p-1"><i class="fa-solid fa-minus"></i></button>' +
            '<div class="mb-3 text-light">' +
            '<label for="icon" class="form-label">Ícone</label>' +
            '<input name="icon" class="form-control icon" value="">' +
            '</div>' +
            '<div class="mb-3 text-light">' +
            '<label for="subtitle" class="form-label">Subtítulo</label>' +
            '<input name="subtitle" class="form-control subtitle" value="">' +
            '</div>' +
            '<div class="mb-3 text-light">' +
            '<label for="description" class="form-label">Descrição</label>' +
            '<input name="description" class="form-control description" value="">' +
            '</div>' +
            '</div>');

        // Adiciona o novo filho ao contêiner
        $('.specials.grid').append(newChild);
        event.preventDefault();
    });

    $(document).on('click', '.btn-specials-minus', function() {   
        $(this).closest('.box-specials').remove();
        event.preventDefault();
    });

    $('form').submit(function(event) {
        // Verifica se o botão pressionado para enviar o formulário tem um nome específico
        if ($(document.activeElement).attr('name') == 'acao') {
            // Captura os dados dos campos dentro do formulário
            var formData = $(this).serializeArray();
            // Verifica se há algum campo relacionado à div box-specials
            var hasSpecialsFields = false;
            $(this).find('.box-specials').each(function() {
                if ($(this).is(':visible')) {
                    hasSpecialsFields = true;
                    return false; // Sai do loop se encontrar um campo relacionado à div box-specials
                }
            });
            if (hasSpecialsFields) {
                // Envie os dados da div box-specials para a inserção
                $.post('/classes/Painel.php', {
                    data: formData,
                    acao: 'insert',
                    name_table: 'tb_admin.specials'
                }, function(response) {
                    console.log(response); // Resposta do servidor
                });
                event.preventDefault();
            }
        }
    });
});
