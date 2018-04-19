<?php

namespace FastRegister;

class FastRegisterAutoloader{
	
	public function __construct(){
		spl_autoload_register(function ($className){
			$front =  (substr($className, 0, 12));
			if ($front == "FastRegister"){
				$includePath = substr($className, 13);
				$includePath = dirname(__DIR__) . "/FastRegister/" . $includePath . ".class.php";
				include $includePath;
			}
		});
	}
	
}
