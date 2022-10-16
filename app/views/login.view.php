<?php
require_once './libs/Smarty.class.php';

class LoginView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showFormLogin($error = null) {
        $this->smarty->assign("error", $error);
        $this->smarty->assign('loggedin', false);
        $this->smarty->display('header.tpl');
        $this->smarty->display('log.tpl');
    }
}
