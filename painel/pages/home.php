<?php 
  	$usuariosOnline = Painel::listarUsuariosOnline();

  	//Pegar Visitas Totais Painel
  	$pegarVisitasTotais = Mysql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
  	$pegarVisitasTotais->execute();
  	$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

  	//Pegar Visitas de Hoje Painel
  	$pegarVisitasHoje = Mysql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
  	$pegarVisitasHoje->execute(array(date('Y-m-d')));
  	$pegarVisitasHoje = $pegarVisitasHoje->rowCount();
?>

	<!--Painel Principal-->
<div class="box-content left w100">

		<h2><i class="fa fa-home"></i>Painel de Controle - <?php echo NOME_EMPRESA  ?></h2>

		<div class="box-metricas">
			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Usuarios Online</h2>
					<p><?php echo count($usuariosOnline);?></p>
			</div>	<!--Metrica Wraper-->
			</div><!--Box-Metrica-Single-->

			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Total de Visitas</h2>
					<p><?php echo $pegarVisitasTotais;?></p>
			</div>	<!--Metrica Wraper-->
			</div><!--Box-Metrica-Single-->
			
			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Vistas Hoje</h2>
					<p><?php echo $pegarVisitasHoje;?></p>
			</div>	<!--Metrica Wraper-->
			</div><!--Box-Metrica-Single-->
			<div class="clear"></div>			
			</div><!--Box - Metrica-->
		
		</div><!--Box-Content-->

		<!--Lista de Usuarios Online : IP -->
	<div class="box-content left w100">
		<h2><i class="fa fa-users" aria-hidden="true"></i>Usuários Online</a></h2>

		<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>IP</span>
			</div><!---Col-->
				<div class="col">
					<span>Ultima Ação</span>
				</div><!--Col-->
		</div><!--Row-->
		<div class="clear"></div>

		<?php foreach($usuariosOnline as $key => $value) {	?>
		
		<div class="row">
			<div class="col">
				<span><?php echo $value['ip']?></span>
			</div><!---Col-->
				<div class="col">
					<span><?php echo date('d/m/y H:i:s',strtotime($value['ultimas_acao']))?></span>
				</div><!--Col-->
			<div class="clear"></div>
		</div><!--Row-->

		<?php }?>		

		</div><!--table-responsive-->
	</div><!--box-content-->

