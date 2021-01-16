<?php
	
	session_start();
	date_default_timezone_set('America/Manaus');
	$autoload = function($class){
		if($class == 'Email'){
			include('classes/phpmailler/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH','http://localhost/Projeto_01/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');


	//Conectar com o Banco de Dados
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','projeto_01');

	//Funções 

	function pegaCargo($cargo){

		$arr =[
			'0' =>'Normal',
			'1'=>'T.I',
			'2'=>'Administrador'];
			return $arr[$cargo];

	}

	//Constante para o Painel de Controle

	define('NOME_EMPRESA','Arlan Marreiro');


?>