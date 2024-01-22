// open-close menu mobile

$(function () {
    $('nav.mobile').click(function () {
        var listmenu = $('nav.mobile ul');

        if (listmenu.is(':hidden') == true) {
            var icone = $('.icone-menu-mobile').find('i');
            icone.removeClass('fa-bars');
            icone.addClass('fa-x');
            listmenu.slideToggle();
        } else {
            var icone = $('.icone-menu-mobile').find('i');
            icone.removeClass('fa-x');
            icone.addClass('fa-bars');
            listmenu.slideToggle();
        }
    });

    // Dynamic scroll
    if ($('target').length > 0) {
        //the element exists, scroll the element 
        var elemento = '#' + $('target').attr('target');
        var divscroll = $(elemento).offset().top;
        $('html,body').animate({ 'scrollTop': divscroll }, 2000);
    }

    // navigation without updating
    carregarDinamico();
    function carregarDinamico() {
        $('[realtime]').click(function () {
            var pagina = $(this).attr('realtime');
            $('.container-principal').hide();
            $('.container-principal').load(INCLUDE_PATH + 'pages/' + pagina + '.php')


            setTimeout(function () {
                initialize();
                addMarker(-26.2295, -52.6716, '', 'Meu escritório', undefined, false);
            }, 1000);

            $('.container-principal').fadeIn(1000);

            return false;
        })
    }
})
