<?php
require_once './app/models/phone.model.php';
require_once './app/models/brand.model.php';
require_once './app/views/view.php';

class PublicController {
    private $phone_model;
    private $brand_model;
    private $view;

    public function __construct() {
        $this->phone_model = new PhoneModel();
        $this->brand_model = new BrandModel();
        $this->view = new PhoneView();
    }

    public function showHome() {
        $phones = $this->phone_model->getAllPhones();
        $brands = $this->brand_model->getAllBrand();
        $this->view->showHome($phones,$brands);
    }

    public function showPhone($id) {
        $phone = $this->phone_model->getPhoneById($id);
        $this->view->showPhone($phone);
    }

    public function showLog() {
        $this->view->showLog();
    }

    public function showAdmin() {
        $phones = $this->phone_model->getAllPhones();
        $brands = $this->brand_model->getAllBrand();
        $this->view->showAdmin($phones,$brands);
    }

    public function showListaByGenre($id){
        $phones = $this->phone_model->getAllPhones();
        $brands = $this->brand_model->getAllBrand();
        $this->view->showListaByGenre($phones,$brands,$id);
    }
}