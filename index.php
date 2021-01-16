<!-- Lista de Funções -->
<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador();?>

<!DOCTYPE html>
<html>
<head>
	<title>Projeto 01</title>

	<link href="<?php echo INCLUDE_PATH;?>estilo/all.css" rel="stylesheet"> <!--load all styles -->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH;?>estilo/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Descrição do Meu WebSite">
	<meta name="keywords" content="Palavra,Chave,Do,Meu,Site">
	<link rel="icon" href="<?php echo INCLUDE_PATH;?>favecon.ico" type="image/x-icon">

</head>
<body>

	<base base="<?php echo INCLUDE_PATH;?>"/>

	<!-- Carregamento Dinâmico -->
	<?php 
	$url = isset($_GET['url']) ? $_GET['url'] :'home';
	
	switch ($url) {
		case 'Depoimentos':
			echo '<target target="Depoimentos" />';
			break;

		case 'Servicos':
			echo '<target target="Servicos" />';
			break;		
	}
	?>
	<!-- Função Envio de Email -->
	<?php 	new Email();	?>

	<header>
		<div class="center">
		<div class="logo left"><a href="http://localhost/Projeto_01/">Logomarca</a></div><!--Logo-->
		<nav class="desktop right">			
			<ul>
				<li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
				<li><a href="<?php echo INCLUDE_PATH;?>Depoimentos">Depoimentos</a></li>
				<li><a href="<?php echo INCLUDE_PATH;?>Servicos">Serviços</a></li>
				<li><a realtime="contato" href="<?php echo INCLUDE_PATH;?>Contato">Contato</a></li>
				<!-- <li><a realtime="Sobre" href="<?php echo INCLUDE_PATH;?>Sobre">Sobre</a></li> -->
			</ul>
		</nav><!--Fim NAV mobile-->
		<div class="clear"></div><!--Clear-->
		</div><!--Fim Center-->

		<nav class="mobile right">			
			<div class="botao-menu-mobile">
				<i class="fas fa-bars"></i>
			</div><!--Fim botão Menu-->
			<ul>
				<li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
				<li><a href="<?php echo INCLUDE_PATH;?>Depoimentos">Depoimentos</a></li>
				<li><a href="<?php echo INCLUDE_PATH;?>Servicos">Serviços</a></li>
				<li><a realtime href="<?php echo INCLUDE_PATH;?>Contato">Contato</a></li>
				<!-- <li><a realtime="Sobre" href="<?php echo INCLUDE_PATH;?>Sobre">Sobre</a></li> -->
			</ul>
		</nav><!--Fim NAV mobile-->

	</header>
			<div class="container-principal"> <!--Div criada para não sumir o topo e o rodapé do site usado para o Script Carregamento de paginas dinamicas PAG - CONTATO-->

			
				<!--Pegar a função - no Jquery para descer para pagina Depoimentos e Serviços-->

			<?php
	if(file_exists('pages/'.$url.'.php')){
		include('pages/'.$url.'.php');
	}else{
		if($url != 'Depoimentos' && $url !='Servicos'){
		$pagina404 = true;
		include('pages/404.php');
		}else{
			include('pages/home.php');
		}
	}
			?>

			</div><!--Fim container-principal-->
	
	<footer <?php if(isset($pagina404) == true)echo 'class="fixed"'?> >

		<div class="center">
		<p>Todos os direitos reservados</p>
		</div><!--Fim Center-->
	</footer>

<!-- Importação JS - Slide Show Home page -->
<script src="<?php echo INCLUDE_PATH;?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH;?>js/script.js"></script>
	<?php
if($url == 'home' || $url ==''){
	?>
<script src="<?php echo INCLUDE_PATH;?>js/slider.js"></script>
<?php } ?>

<?php 
if($url == 'contato'){
?>
<?php }?>

<script src="<?php echo INCLUDE_PATH;?>js/exemplo.js"></script>

</body>
</html>