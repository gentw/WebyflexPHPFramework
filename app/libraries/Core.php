<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
*/
class Core {
	protected $currentController = 'Pages';
	protected $currentMethod = 'index';
	protected $params = [];

	public function __construct() {
		//print_r($this->getUrl());
		$url = $this->getUrl();

		if(!empty($url[0])) {
			// Look in controllers for first value
			if(file_exists('../app/controllers/' . ucwords($url[0] . '.php'))) {
				$this->currentController = ucwords($url[0]);
				
				unset($url[0]);
			}else {
				redirect(); // to HOME
			}
		}

		require_once '../app/controllers/' . $this->currentController . '.php';
		$c = $this->currentController = new $this->currentController;
		

		if(isset($url[1])) {
			if(method_exists($this->currentController, $url[1])) {
				$this->currentMethod = $url[1];

				unset($url[1]);
			} 
		}

		$this->params = $url ? array_values($url) : [];
	
		if($this->getNumOfParams($this->currentController, $this->currentMethod) >= 1){
			if(sizeOf($this->params) == 0)
				redirect();

			call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
		}
		/*elseif($this->needParams($c->currentMethod) == 0):
			call_user_func([$this->currentController, $this->currentMethod]);*/
		else {
			call_user_func([$this->currentController, $this->currentMethod]);
		}
	}


	public function getNumOfParams($class, $func) {
		$reflection = new ReflectionClass($class);
		$method = $reflection->getMethod($func);

		return $method->getNumberOfParameters();
	}


	public function getUrl() {
		if(isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}