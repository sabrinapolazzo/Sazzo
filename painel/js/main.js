$(function() {
    var open = true;
    var windowSize = $(window)[0].innerWidth;

    var targetSizeMenu = (windowSize <= 400) ? 200 : 270

    if (windowSize <= 768) {
        open = false;
        $('.form-control.w-25').removeClass('w-25');
    }

    $('.menu-btn').click(function(){
       if(open){
        //Não precisamos fechar
        $('aside').animate({'width' : '0'},function() {
            open = false;
        });
        $('.flex.components-menu').animate({'margin-left' : '0'},function() {
            open = false;
        });
       }else{
        // fechar menu
        $('aside').animate({'width' : targetSizeMenu+'px'},function() {
            open = true;
        });
        $('.flex.components-menu').animate({'margin-left' : targetSizeMenu+'px'},function() {
            open = true;
        });
       }
    })
})

