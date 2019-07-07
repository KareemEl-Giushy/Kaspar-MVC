<?php
    class Post {
        private $db;
        public function __construct() {
            $db = new Database();
        }
    }