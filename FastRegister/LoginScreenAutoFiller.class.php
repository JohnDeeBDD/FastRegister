<?php

namespace FastRegister;

class LoginScreenAutoFiller{
	
	public function __construct(){
		//die('LoginScreenAutoFiller');
		add_action('login_enqueue_scripts', array($this, 'enqueJquery'));
	}
	
	public function autoFillLoginScreenWithEmail(){
		add_action('login_head', array($this, 'doAutoFillLoginScreenWithEmail'));
	}
	
	public function enqueJquery(){
		wp_enqueue_script( 'jquery');
	}
	
	public function doAutoFillLoginScreenWithEmail(){
		session_start();
		if(isset($_SESSION['crg_submitted_email'])){
			$email =$_SESSION['crg_submitted_email'];
		}else{
			$email = "";
		}
		$output = <<<OUTPUT
<script>
	jQuery( document ).ready(function() {
		jQuery('#user_login').val('$email');
		jQuery('#rememberme').prop('checked', true);
		setTimeout(
  			function() 
  				{
					jQuery('input[name="pwd"]').focus();
  				}, 500);
				
	});
</script>
OUTPUT;
		echo $output;
	}
}