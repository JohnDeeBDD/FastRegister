<?php

namespace FastRegister;

class FastRegisterPlugin{
	
	public function __construct(){
		$this->doAutoloader();
		//add_action( 'widgets_init', array($this, 'enableSidebarWidget' ));
	}
	
	public function doAutoloader(){
		include_once('FastRegisterAutoloader.class.php');
		$FastRegisterAutoloader = new FastRegisterAutoloader;
	}
	
	public function enableShortCode_fastRegister(){
		add_shortcode('fast-register', array($this, 'doShortCode_fastRegister'));
	}

	public function enableFormListener(){
		//The plugin listens for a form variable to be submitted:
		if (isset($_POST['CRG-fast-register-email'])){
			$fastRegisterEmail = $_POST['CRG-fast-register-email'];
			$IncomingEmailHandler = new IncomingEmailHandler($fastRegisterEmail);
		}
	}
	
	public function doShortCode_fastRegister(){
		$SHORTCODE_fastRegister = new SHORTCODE_fastRegister;
		return $SHORTCODE_fastRegister->returnHTMLOutput();
	}
	
	public function enableSidebarWidget(){
		include_once 'FastRegisterSidebarWidget.class.php';
	}
	
	public function autoFillLoginScreenForm(){
		if($_SERVER['REQUEST_URI'] == "/wp-login.php" or $_SERVER['REQUEST_URI'] == "/wp-login.php/" or $_SERVER['REQUEST_URI'] == "/login/" or $_SERVER['REQUEST_URI'] == "/login"){
			include_once('LoginScreenAutoFiller.class.php');
			$LoginScreenAutoFiller = new LoginScreenAutoFiller;
			$LoginScreenAutoFiller->autoFillLoginScreenWithEmail();
		}
	}
	
}
