<?php
  /** APP CORE CLASS
    * Creates URLS & load core controller
    * URL format - /controller(name of the page)/method/params
  **/
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
      // print_r($this->geturl());
      $url = $this->geturl();

      // look in controllers for first value
      if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
        // if exists , set as controller
        $this->currentController = ucwords($url[0]);
        // unset index 0
        unset($url[0]);

        // print_r($url);
      }

      // require the controller 'include it'
      require_once '../app/controllers/' . $this->currentController . '.php';

      // init the controller
      $this->currentController = new $this->currentController;

      // check for second part of url
      if ( isset( $url[1] ) ) {
        // check to see if method exists in the conttroller
        if (method_exists($this->currentController, $url[1])) {
          $this->currentMethod = $url[1];
          // Unset index 1
          unset($url[1]);
        }
      }

      // echo $this->currentMethod;
      // Get the Params Check the Third Part
      $this->params = $url ? array_values($url) : [];
      // Callback the array 
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    
    }

    public function geturl() {
      if ( isset($_GET['url']) && !empty($_GET['url']) ) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        // print_r ($url);
        return $url;
      }
    }
  }
