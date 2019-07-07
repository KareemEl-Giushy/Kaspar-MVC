<?php
  // load the config file
  require_once 'config/config.php';
  
  // loading libraries
  /*
  require_once "libraries/Core.php";
  require_once "libraries/Controller.php";
  require_once "libraries/database.php";
  */

  // loading the Libraries automaticly
  spl_autoload_register(function ($className){
    // Including the classes (files)
    require_once 'libraries/' . $className . '.php';    
  
  });