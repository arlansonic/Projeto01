<div class="box-content">

	<h2><i class="fas fa-pencil-alt"></i> Editar Usuario</h2>
	<form method="post" enctype="multipart/form-data">

		<?php if(isset($_POST['acao'])){
			//Enviar o meu Formulário.
			Painel::alert('sucesso',' Atualizado com Sucesso!');

		}

			?>
		<div class="form-group">
			<label>Nome: </label>
			<input type="text" name="nome" required value="<?php echo $_SESSION['nome']?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Senha: </label>
			<input type="password" name="senha" required value="<?php echo $_SESSION['password'] ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem: </label>
			<input type="file" name="imagem">
			<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome: </label>
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>
</div> <!--box-content-->