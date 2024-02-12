$(function () {

    var contador = 1;

    $('#btn-specials-plus').click(function () {
        // Cria uma nova div para o novo filho
        var newChild = $('<div class="box-specials w-90 bg-terciary-color mb-5 p-3">' +
            '<button style="width: 30px;" class="btn specials-minus bg-secundary-color text-light mb-3 p-1"><i class="fa-solid fa-minus"></i></button>' +
            '<div class="mb-3 text-light">' +
            '<label class="form-label">Ícone</label>' +
            '<input name="box_insert'+ contador +'[icon]" class="form-control icon">' +
            '</div>' +
            '<div class="mb-3 text-light">' +
            '<label  class="form-label">Subtítulo</label>' +
            '<input name="box_insert'+ contador +'[subtitle]" class="form-control subtitle">' +
            '</div>' +
            '<div class="mb-3 text-light">' +
            '<label class="form-label">Descrição</label>' +
            '<input name="box_insert'+ contador +'[description]" class="form-control description">' +
            '</div>' +
            '<input type="hidden" name="box_insert'+ contador +'[name_table]" value="tb_admin.specials">' +
            '</div>');

        // Adiciona o novo filho ao contêiner
        $('.specials.grid').append(newChild);
        event.preventDefault();

        contador++;
    });

    $(document).on('click', '.btn.specials-minus', function () {
        $(this).closest('.box-specials').hide();
        event.preventDefault();
    });
});
