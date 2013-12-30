<?php
	class URLParser{
		protected $url = null;
		protected $protocol = null;
		protected $base_uri = null;
		protected $service_url = null;
		protected $host = null;
		protected $port = null;
		protected $path = null;
		protected $query = null;
		protected $controller = null;
		protected $action = null;
		public function __construct($base_uri = '/'){
			$this->protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
			$this->url = $this->protocol.'://'.$_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
			$this->base_uri = $base_uri;
			$elements = parse_url($this->url);
			if(!$elements){
				throw new InvalidURLException();
			}
			$this->host = $elements['host'];
			$this->port = $elements['port'];
			$this->path = $elements['path'];
			$this->service_url = preg_replace('/^'.preg_quote($base_uri,'/').'/', '', $this->path);
			if(isset($elements['query'])){
				$this->query = $elements['query'];
			}
			$parts = explode('/', $this->service_url);
			$this->controller = $parts[0];
			if(isset($parts[1])){
				$this->action = $parts[1];
			}
		}

		public function getFullURL(){
			return $this->url;
		}

		public function getProtocol(){
			return $this->protocol;
		}

		public function getBaseUri(){
			return $this->base_uri;
		}

		public function getServiceUrl(){
			return $this->service_url;
		}

		public function getHost(){
			return $this->host;
		}

		public function getPort(){
			return $this->port;
		}

		public function getPath(){
			return $this->path;
		}

		public function getQuery(){
			return $this->query;
		}

		public function getController(){
			return $this->controller;
		}

		public function getAction(){
			return $this->action;
		}

		public function dump(){
			$result  = 	'Full URL: '.htmlentities($this->getFullUrl()).'</br>';
			$result .=	'Protocol: '.$this->getProtocol().'</br>';
			$result .=	'Host: '.$this->getHost().'</br>';
			$result .=	'Port: '.$this->getPort().'</br>';
			$result .=	'Path: '.$this->getPath().'</br>';
			$result .=	'Query: '.htmlentities($this->getQuery()).'</br>';
			$result .=	'Base URI: '.$this->getBaseUri().'</br>';
			$result .=	'Service URL: '.$this->getServiceUrl().'</br>';
			$result .=	'Controller: '.$this->getController().'</br>';
			$result .=	'Action: '.$this->getAction().'</br>';
			echo $result;
		}
	}
?>