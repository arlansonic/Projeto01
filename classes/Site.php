<?php
	//Funções para Usuarios Online: Total de Visitas : Visitas diarias
	class Site{

	public static function updateUsuarioOnline(){
		if(isset($_SESSION['online'])){
			$token = $_SESSION['online'];
			$horarioAtual = date('Y-m-d H:i:s');

			$check = Mysql::conectar()->prepare("SELECT `id` FROM `tb_admin.online` WHERE token = ?");
			$check ->execute(array($_SESSION['online']));

			if($check->rowCount() == 1){
				$sql = Mysql::conectar()->prepare("UPDATE `tb_admin.online` SET ultimas_acao = ? WHERE token = ?");
				$sql->execute(array($horarioAtual,$token));
			}else{

				$_SESSION['online'] = uniqid();
				$ip = $_SERVER['REMOTE_ADDR'];
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = Mysql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES(null,?,?,?)");			
				$sql->execute(array($ip,$horarioAtual,$token));

			}

			
		}else{
			$_SESSION['online'] = uniqid();
			$ip = $_SERVER['REMOTE_ADDR'];
			$token = $_SESSION['online'];
			$horarioAtual = date('Y-m-d H:i:s');
			$sql = Mysql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES(null,?,?,?)");			
			$sql->execute(array($ip,$horarioAtual,$token));

		}
	}

	//Contador de Visitas
	public static function contador(){

		if(!isset($_COOKIE['visitas'])){
			setcookie('visitas','true',time() + (60*60*24*7));
			$sql = Mysql::conectar()->prepare("INSERT INTO `tb_admin.visitas` VALUES (null,?,?)");
			$sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
		}

	}
}

?>