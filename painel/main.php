<?php
	
	if(isset($_GET['loggout'])){
		Painel::loggout();
		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400,700&display=swap" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH;?>estilo/all.css" rel="stylesheet"> <!--load all styles -->
</head>
<body>

<div class="menu">
	<div class="menu-wraper">
	<div class="box-usuario">
		<?php 
		if($_SESSION['img'] ==''){
		
		?>
		<div class="avatar-usuario">
			<i class="fa fa-user"></i>
		</div><!--Avatar-Usuario-->
		<?php }else{ ?>

			<div class="imagem-usuario">
				<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php  echo $_SESSION['img']; ?>"/>
			</div><!--Avatar-Usuario-->

		<?php }?>
			<div class="nome-usuario">
				<p><?php echo $_SESSION['nome'];?> </p>		
				<p><?php echo pegaCargo($_SESSION['cargo']);?></p>		
		</div><!--Nome-usuario-->
	</div><!--Box-Usuario-->
	<div class="item-menu">
		<h2>Cadastro</h2>
		<a href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-depoimento">Cadastrar Depoimento</a>
		<a href="">Cadastrar Serviços</a>
		<a href="">Cadastrar Slides</a>
		<h2>Gestão</h2>
		<a href="">Listar Depoimentos</a>
		<a href="">Listar Serviços</a>
		<a href="">Listar Slides</a>
		<h2>Administração</h2>
		<a href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuarios">Editar Usuario</a>
		<a href="">Adicionar Usuario</a>
		<h2>Gestão Geral</h2>
		<a href="">Editar</a>
	</div><!--Item - Menu-->
</div><!--Menu - Wraper-->
</div><!--Fim MENU-->

<header>
	<div class="center">

		<div class="menu-btn"> 
		
			<i class="fa fa-bars"></i>
		</div>

		<div class="loggout">		
			<a href="<?php echo INCLUDE_PATH_PAINEL?>"><i class="fa fa-home"></i><span>Home</span></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>?loggout"><i class="fa fa-window-close"> <span>Sair</span></i></a>
		</div><!---Fim Loggout-->

		<div class="clear"></div>
	</div><!--Center-->
</header>

<div class="content">

	<?php Painel::carregarPagina(); ?>

</div><!---Content-->

<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
</body>
</html>
