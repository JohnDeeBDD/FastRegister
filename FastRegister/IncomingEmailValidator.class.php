<?php

namespace FastRegister;

class IncomingEmailValidator{
	
	public function isAValidEmail($email) {
		
		//This function won't work unless it's contained in a WP action hook
					
		$emailIsValid = TRUE;
		
		if (!($this->isAnActualEmail($email))){
			$emailIsValid = FALSE;
		}
		
		global $wpdb;
		if (email_exists($email)){
			$emailIsValid = FALSE;
		}
		return $emailIsValid;
	}
	
	public function isAnActualEmail($email){
		//NOTE COMPLETE!
		if (1 == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
}