<?php
    /*
    ** The Base Controller
    ** It is connected to the models and views
    ** It will get things(data) from the model and load it in the screen ==> (views)
    */
    class Controller {
        
        // load Models
        public function models($model) {
            // Require Model File
            require_once '../app/models/' . $model . '.php';

            // instatiate the model
            return new $model();

        }

        // Load Views
        public function view($view, $data = []) {
            // checking the view file
            if (file_exists('../app/views/' . $view . '.php')) {
                // Inserting that file
                require_once '../app/views/' . $view . '.php';
            
            }else {
                // view Doesn't Exists
                die('View Doesn\'t Exists');
            }

        }
    }