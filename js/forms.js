$(function () {
    $('body').on('submit', 'form', function (e) {
        e.preventDefault();

        var form = $(this);
        console.log('Form data:', form.serialize());
        $.ajax({
            beforeSend: function () {
                $('.overlay-loading').fadeIn();
            },
            url: 'http://localhost/php-project01/ajax/forms.php',
            method: 'post',
            dataType: 'json',
            data: form.serialize()
        }).done(function (data) {
            if (data.sucesso) {
                $('.overlay-loading').fadeOut();
                $('.sucesso').fadeIn();
                setTimeout(function(){
                    $('.sucesso').fadeOut();
                }, 3000)
            } else {
                $('.overlay-loading').fadeOut();
                $('.erro').fadeIn();
                setTimeout(function(){
                    $('.erro').fadeOut();
                }, 3000)
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log("Erro na requisição AJAX:", textStatus, errorThrown);
        });
        

    })
})