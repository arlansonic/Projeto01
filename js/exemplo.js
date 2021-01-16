$(function(){

	//alert('Teste Pag exemplo.js');

	/*Função para Chamar o BOX-ESPECIALIDADES com efeito - e Delay*/
	var atual = -1;
	var maximo = $('.box-especialidade').length - 1;
	var timer;
	var animacaoDelay = 2;

	executarAnimacao();
	function executarAnimacao(){
		$('.box-especialidade').hide();
		timer = setInterval(logicaAnimacao, animacaoDelay*1000);

		function logicaAnimacao(){
			atual++;
			if(atual > maximo){
				clearInterval(timer);

				return false;
			}
			$('.box-especialidade').eq(atual).fadeIn();
		}
	}
})