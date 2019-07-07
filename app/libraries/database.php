<?php
    /*
    ** PDO Database Class
    ** = Connect To The Database
    ** = Create Prepared Statments
    ** = Bind Values
    ** = Return Results
    */
    class Database {
        private $db_name    = DB_NAME;
        private $host       = HOST;
        private $username   = USERNAME;
        private $password   = PASSWORD;

        // handeling
        private $con;
        private $err;

        public function __construct() {
            // Adding Attributes(options) to the connection
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
    
            // Trying The Connection
            try {    
                // The Connection
                $this->con = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password, $options);
                
                // verfiy
                echo 'connected';
            } catch (PDOException $e) {
                // Printing The Exception After Storing it
                $this->err =  $e->getMessage();
                echo 'failed to connect =>  ' . $this->err;
            }


        }
    }