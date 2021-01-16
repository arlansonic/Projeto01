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

	<div class="box-login">
		<?php
		if(isset($_POST['acao'])){
			$user = $_POST['user'];
			$password = $_POST['password'];
			$sql = MySql:: conectar()-> prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
			$sql -> execute(array($user,$password));
			if($sql->rowCount()==1){
				$info = $sql->fetch();
				//Logamos com Sucesso
				$_SESSION['login'] = true;
				$_SESSION['user'] =$user;
				$_SESSION['password'] =$password;
				$_SESSION['cargo'] = $info['cargo'];
				$_SESSION['nome'] = $info['nome'];
				$_SESSION['img'] = $info['img'];
				header('Location:',INCLUDE_PATH_PAINEL);
				die();
			}else{
				echo'<div class="erro-box"><i class="fa fa-times"></i> Usuário ou Senha Invalida</div>';
			}
		}

		?>
		
		<h2>Efetue seu Login</h2>
		<form method="post">
			<input type="text" name="user" placeholder="Login.." required="">
			<input type="password" name="password" placeholder="Senha.." required="">
			<input type="submit" name="acao" value="logar">
		</form>		
	</div><!--Fim box-login-->

</body>
</html>