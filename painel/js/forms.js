$(function () {

    var count = 1; // Inicializa o contador de caixas especiais

    $('#btn-specials-plus').click(function (event) {
        // Cria uma nova div para o novo filho
        var newChild = $('<div class="box-specials w-90 bg-terciary-color mb-5 p-3">' +
            '<button style="width: 30px;" class="btn specials-minus bg-secundary-color text-light mb-3 p-1"><i class="fa-solid fa-minus"></i></button>' +
            '<div class="mb-3 text-light">' +
            '<label for="icon" class="form-label">Ícone</label>' +
            '<input name="box_insert[' + count + '][icon]" class="form-control icon" value="">' +
            '</div>' +
            '<div class="mb-3 text-light">' +
            '<label for="subtitle" class="form-label">Subtítulo</label>' +
            '<input name="box_insert[' + count + '][subtitle]" class="form-control subtitle" value="">' +
            '</div>' +
            '<div class="mb-3 text-light">' +
            '<label for="description" class="form-label">Descrição</label>' +
            '<input name="box_insert[' + count + '][description]" class="form-control description" value="">' +
            '</div>' +
            '<input type="hidden" name="box_insert[' + count + '][name_table]" value="tb_admin.specials">' +
            '</div>');

        // Adiciona o novo filho ao contêiner
        $('.specials.grid').append(newChild);

        count++; // Incrementa o contador de caixas especiais

        event.preventDefault();
    });

    $(document).on('click', '.btn.specials-minus', function () {
        $(this).closest('.box-specials').hide();
        event.preventDefault();
    });
});
