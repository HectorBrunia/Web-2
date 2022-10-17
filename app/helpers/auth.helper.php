<?php

class AuthHelper {

    public function checkLoggedIn() {
        
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . 'log');
            die();
        }
    }

    public function IsLoggedIn(){
        if (!isset($_SESSION['IS_LOGGED'])) {
            return false;
        }
        else{
            return true;
        }
    }
}