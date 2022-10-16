<?php
require_once './libs/Smarty.class.php';
class PhoneView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); 
    }

    function showHome($phones,$brands,$loggedin,$id) {
        $this->smarty->assign('phones', $phones);
        $this->smarty->assign('brands', $brands);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('loggedin', $loggedin);
        $this->smarty->display('header.tpl');
        $this->smarty->display('phoneList.tpl');
    }

    function showPhone($phone,$loggedin) {
        $this->smarty->assign('phone', $phone);
        $this->smarty->assign('loggedin', $loggedin);
        $this->smarty->display('header.tpl');
        $this->smarty->display('phone.tpl');
    }

    function showFormEdit($phone,$brands,$loggedin) {
        $this->smarty->assign('phone', $phone);
        $this->smarty->assign('brands', $brands);
        $this->smarty->assign('loggedin', $loggedin);
        $this->smarty->display('header.tpl');
        $this->smarty->display('formedit.tpl');
    }
}
?>