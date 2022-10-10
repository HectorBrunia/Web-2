<?php
require_once './libs/Smarty.class.php';
class PhoneView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); 
    }

    function showHome($phones,$brands) {
        session_start();
        $this->smarty->assign('phones', $phones);
        $this->smarty->assign('brands', $brands);
        $this->smarty->display('phoneList.tpl');
    }
    function showPhone($phone) {
        session_start();
        $this->smarty->assign('phone', $phone);
        $this->smarty->display('phone.tpl');
    }
    function showAdmin($phones, $brands){
        $this->smarty->assign('phones', $phones);
        $this->smarty->assign('brands', $brands);
        $this->smarty->display('admin.tpl');
    }
    function showFormEdit($phone) {
        session_start();
        $this->smarty->assign('phone', $phone);
        $this->smarty->display('formedit.tpl');
    }
}
?>