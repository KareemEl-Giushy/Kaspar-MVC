<?php
  /** APP CORE CLASS
    * Creates URLS & load core controller
    * URL format - /controller/method/params
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
      }

      // require the controller 'include it'
      require_once '../app/controllers/' . $this->currentController . '.php';

      // init the controller
      $this->currentController = new $this->currentController;
    }

    public function geturl() {
      if ( isset($_GET['url']) && !empty($_GET['url']) ) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        return $url;
      }
    }
  }
