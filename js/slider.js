$(function(){
 	//alert("Olá Mundo");
	var curSlide = 0;
	var maxSlide = $('.banner-single').length - 1;

	console.log(maxSlide);
	var delay = 3;

	initSlider(); //Inicialização Slide 
	changeSlide(); //Função de animação Slide
	


	//Função para as Bolinhas do Slide ficarem passando de acordo com a animação 
	function initSlider(){
		$('.banner-single').hide();
		$('banner-single').eq(0).show();
		for(var  i = 0 ; i < maxSlide+1; i++){
			var content = $('.bullets').html();
			if(i== 0)
				content+='<span class="active-slider"></span>';
			else
				content+='<span></span>';
			$('.bullets').html(content);
		}
	}

	//Função para carregamento da animação, como velocidade e passagem
	function changeSlide(){
		setInterval(function(){
			$('.banner-single').eq(curSlide).animate({'opacity':'0'},2000);
			curSlide++;
			if(curSlide > maxSlide)
				curSlide = 0;
			$('.banner-single').eq(curSlide).animate({'opacity':'1'},2000);
			//Trocar Bullets da navegação do Slider
			$('.bullets span').removeClass('active-slider');
			$('.bullets span').eq(curSlide).addClass('active-slider');

				},delay *1000);
		console.log('Carregamento de Slide');
	}

	//Função para passagem de Sliders atraves dos botões de navegação 
	$('body').on('click','.bullets span',function(){
		var currentBullet = $(this);

		$('.banner-single').eq(curSlide).animate({'opacity':'0'},2000);
		curSlide = currentBullet.index();
		$('.banner-single').eq(curSlide).animate({'opacity':'1'},2000)

		$('.bullets span').removeClass('active-slider');
		currentBullet.addClass('active-slider');


	})

	// $('.bullets span').click(function(){
	// 	alert('Clicando');
	// 	console.log('Passagem de Slide funciondo!');
	// })



})