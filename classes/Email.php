<?php

class Email
{
	
	function __construct()
	{

		// use PHPMailer\PHPMailer\PHPMailer;
		// use PHPMailer\PHPMailer\SMTP;
		// use PHPMailer\PHPMailer\Exception;

		// // Load Composer's autoloader
		// require 'vendor/autoload.php';

		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		$this->mailer = new PHPMailer;

			$this->mailer->isSMTP();                                      // Set mailer to use SMTP
			$this->mailer->Host = 'smtp1.amazonsilkemp.com.br';  				  // Specify main and backup SMTP servers
			$this->mailer->SMTPAuth = true;                               // Enable SMTP authentication
			$this->mailer->Username = 'tecnologia@amazonsilkemp.com.br';                 // SMTP username
			$this->mailer->Password = 'Marreirohd@18';                           // SMTP password
			$this->mailer->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$this->mailer->Port = 465;                                    // TCP port to connect to

			$this->mailer->setFrom('tecnologia@amazonsilkemp.com.br','Marreirohd@18');
			$this->mailer->isHTML(true);                                  // Set email format to HTML
			$this->mailer->CharSet = 'UTF-8';

		}

		public function addAdress($email,$nome){
			$this->mailer->addAddress('diretoria@amazonsilkemp.com.br','Amazonsilk');
		}

		public function formatarEmail($info){
			$this->mailer->Subject = $info['assunto'];
			$this->mailer->Body    = $info['corpo'];
			$this->mailer->AltBody = strip_tags($info['corpo']);
		}

		public function enviarEmail(){
			if($this->mailer->send()){
				return true;
			}else{
				return false;
			}
	}
}

?>