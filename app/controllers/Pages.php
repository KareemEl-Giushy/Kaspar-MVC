<?php
  class Pages extends Controller {
    
    public function __construct() {
      $this->models('Post'); // new Post();
    }
    public function index (){
      $data = ['title' => 'welcome'];
      $this->view('pages/index', $data);
    }
    public function about (){
      $data = ['title' => 'about'];
      $this->view('pages/index', $data);
    }
  }
