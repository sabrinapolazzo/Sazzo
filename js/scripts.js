//abrir e fechar menu mobile

$(function(){
    $('nav.mobile').click(function(){
        var listmenu = $('nav.mobile ul');

        if(listmenu.is(':hidden') == true){
           var icone = $('.icone-menu-mobile').find('i');
            icone.removeClass('fa-bars');
            icone.addClass('fa-x');
            listmenu.slideToggle();
        }else{
            var icone = $('.icone-menu-mobile').find('i');
            icone.removeClass('fa-x');
            icone.addClass('fa-bars');
            listmenu.slideToggle();
        }
    })
})
