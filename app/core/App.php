<?php 

class App {
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params= [];


	public function __construct()
	{
		$url = $this->parseURL();
		
		// mengambil controller
		if ( file_exists('../app/controllers/'.$url[0].'.php')){
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once '../app/controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller;

		// bikin method
		if (isset($url[1])) {
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// kelola parameter 
		if( !empty($url)){
			$this->params = array_values($url);
		}

		// jalankan controller dan medhod , serta kirimkan params jika ada
		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	public function parseURL()
	{
		if(isset($_GET['url'])){
			// menghapus slash pada akhir url
			$url = rtrim($_GET['url'],'/');
			// bersihin url dari karakter jahad
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// MEMECAH URL BERDASARKAN TANDA SLASH
			$url = explode('/', $url);
			return $url;
		}
	}
}