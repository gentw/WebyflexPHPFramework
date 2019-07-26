<?php
	/*
	* Base Controller
	* Loads the models and views :-)
	*/
class Controller {

	public function getNumOfParams($func) {
		$reflection = new ReflectionClass('Controller');
		$call = $reflection->getMethod($func);
		return $call->getNumberOfParameters();
	}

	public function test($c) {
		return 'CUC';
	}

	
	
	

}