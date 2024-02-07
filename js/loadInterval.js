$(function(){

    var atual = -1;
    var maximo = $('.box-especialidades').length -1;
    var timer;
    var animacaoDelay = 1;

    executarAnimacao();
    function executarAnimacao(){
        $('.box-especialidades').hide();
        timer = setInterval(rodaAnimacao, animacaoDelay * 1000);

        function rodaAnimacao() {
            atual++;
            if (atual > maximo) {
                clearInterval(timer);
                return false;
            }
            $('.box-especialidades').eq(atual).fadeIn();
        }
    }
})