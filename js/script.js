$(function(){
//Aqui todo o Codigo do JavaScript
	$('nav.mobile').click(function(){
		//O que vai acontecer quando clicarmos na NAV.MOBILE
		var listaMenu = $('nav.mobile ul');
		//Abrir o menu através do fadeIn
		/*
		if(listaMenu.is(':hidden')== true){
		listaMenu.fadeIn();
		}else
			listaMenu.fadeOut();
	})
	*/	//Abrir e fechar o Menu com apenas 1 linha de codigo
		

		//Abrir e fechar Menu sem efeito
		// if(listaMenu.is(':hidden')== true){
		// listaMenu.show(); 
		// listaMenu.css('display','block');
		// }else
		// 	listaMenu.hide();
		// 	listaMenu.css('display','none');

		if(listaMenu.is(':hidden') == true){
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-bars');
			icone.addClass('fa-times');
			listaMenu.slideToggle();
		}
		else{
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-times');
			icone.addClass('fa-bars');
			listaMenu.slideToggle();	
		}
		
		
		});

	//Ação para descer Paginas na Index "Sobre" "Servicos"

	if($('target').length>0){
		//O elemento existe, portanto precisamos dar o scroll em algum elemento.

		var elemento ='#'+$('target').attr('target');
		var divScroll = $(elemento).offset().top;

		$('html,body').animate({'scrollTop':divScroll},2000);

}
	//Carregar Dinamicamente a pagina Contato
	carregarDinamico();
	function carregarDinamico(){
		$('[realtime]').click(function(){
			var pagina = $(this).attr('realtime');
			$('.container-principal').load('/Projeto_01/pages/'+pagina+'.php');
			return false;

			console.log('Carregamento Dinamico feito com sucesso.');
			alert('Carregamento Dinamico realizado com sucesso');
			
		})

	}

})