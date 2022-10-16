<?php
require_once './app/models/phone.model.php';
require_once './app/models/brand.model.php';
require_once './app/views/view.php';
require_once '.\app\helpers\auth.helper.php';
class PublicController {
    private $phone_model;
    private $brand_model;
    private $view;
    private $helper_model;

    public function __construct() {
        $this->phone_model = new PhoneModel();
        $this->brand_model = new BrandModel();
        $this->view = new PhoneView();
        $this->helper_model = new AuthHelper();
    }

    public function showHome() {
        $loggedin = $this->helper_model->IsLoggedIn();
        $phones = $this->phone_model->getAllPhones();
        $brands = $this->brand_model->getAllBrand();
        $id=null;
        $this->view->showHome($phones,$brands,$loggedin,$id);
    }

    public function showPhone($id) {
        $loggedin = $this->helper_model->IsLoggedIn();
        $phone = $this->phone_model->getPhoneById($id);
        $this->view->showPhone($phone,$loggedin);
    }

    public function showLog() {
        $this->view->showLog();
    }

    public function showPhoneByGenre($id){
        $loggedin = $this->helper_model->IsLoggedIn();
        $phones = $this->phone_model->getAllPhones();
        $brands = $this->brand_model->getAllBrand();
        $this->view->showHome($phones,$brands,$loggedin,$id);
    }
}