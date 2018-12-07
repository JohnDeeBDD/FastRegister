<?php

namespace FastRegister;

class SHORTCODE_fastRegister{
	
	public function returnHTMLOutput(){
		
		//return "SHORTCODE_fastRegister is working!!!";
		if(is_user_logged_in()){
			return $this->userIsLoggedIn();
		}
		if(!(is_user_logged_in())){
			return $this->userInNotLoggedIn();
		}
	}
	
	public function userIsLoggedIn(){
		$output = __("You are logged in as ", "fast-register");
		return $output;
	}
	
	public function userInNotLoggedIn(){
		$output = file_get_contents(dirname(__FILE__) . 'ShortCodeForm.html');
		return $output;		
	}
}
