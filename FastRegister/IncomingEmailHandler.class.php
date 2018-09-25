<?php

namespace FastRegister;

class IncomingEmailHandler{
	
	public $email;
	
	public function __construct($fastRegisterEmail) {
		$this->email = $fastRegisterEmail;
		add_action('setup_theme', array($this, 'handleEmail') );
	}
	
	public function handleEmail(){
		$email = $this->email;
		$IncomingEmailValidator = new IncomingEmailValidator($email);
		session_start();
		if (!(email_exists( $email ))){
			if ($IncomingEmailValidator->isAValidEmail($email)){
				global $wp;
				$current_url = home_url(add_query_arg(array(),$wp->request));
				$current_url = $current_url . $_SERVER['REQUEST_URI'];
				$_SESSION['crg_login_redirect_url'] = $current_url;
				$CreateAndSignonNewUserBasedOnEmail = new CreateAndSignonNewUserBasedOnEmail;
				$CreateAndSignonNewUserBasedOnEmail->createAndSignonUser($email, "subscriber");
			}
		}
		if(email_exists($email)){
			$_SESSION['crg_submitted_email'] = $email;
			$baseURL = home_url(add_query_arg(array(),$wp->request));
			//$loginURL = $baseURL . "/login/";
			$loginURL = $baseURL . "/wp-login.php/";
			
			header("Location: $loginURL");
			die();
		}
	}	
}
