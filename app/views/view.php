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
        $this->smarty->display('phoneList.tpl');
    }

    function showPhone($phone) {
        $this->smarty->assign('phone', $phone);
        $this->smarty->display('phone.tpl');
    }

    function showFormEdit($phone,$brands) {
        $this->smarty->assign('phone', $phone);
        $this->smarty->assign('brands', $brands);
        $this->smarty->display('formedit.tpl');
    }
}
?>