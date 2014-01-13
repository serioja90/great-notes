<?php
  
  class ApplicationController{
    protected $params = null;
    protected $layout = "application";
    public function __construct(){
      $this->params = array_merge($_GET,$_POST);
    }

    protected function render($args){
      list(,$caller) = debug_backtrace(false);
      $action = $caller['function'];
      $controller = preg_replace('/controller$/','',strtolower($caller['class']));
      if(isset($args)){
        if(isset($args['action'])){
          $action = $args['action'];
        }
        if(isset($args['controller'])){
          $controller = $args['controller'];
        }
        if(isset($args['locals'])){
          extract($args['locals']);
        }
      }
      ob_start();
      include('app/views/'.$controller.'/'.$action.'.php');
      $output = ob_get_clean();
      include('app/views/layouts/'.$this->layout.'.php');
    }

    protected function render_partial($args){
      list(,$caller) = debug_backtrace(false);
      $action = $caller['function'];
      $controller = preg_replace('/controller$/','',strtolower($caller['class']));
      if(isset($args)){
        if(isset($args['action'])){
          $action = $args['action'];
        }
        if(isset($args['controller'])){
          $controller = $args['controller'];
        }
        if(isset($args['locals'])){
          extract($args['locals']);
        }
      } 
      if(file_exists('app/views/'.$controller.'/_'.$action.'.php')){
        require_once('app/views/'.$controller.'/_'.$action.'.php');
      }else{
        require_once('404.html');
      }
    }
  }
?>