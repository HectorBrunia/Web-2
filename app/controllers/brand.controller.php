<?php
require_once './app/models/brand.model.php';
require_once './app/views/view.php';
require_once '.\app\helpers\auth.helper.php';
class BrandController {
    private $brand_model;
    private $phone_model;
    private $view;
    private $authHelper;

    public function __construct() {
        
        $this->brand_model = new BrandModel();
        $this->phone_model = new PhoneModel();
        $this->view = new PhoneView();
        $this->authHelper = new AuthHelper();
    }


    public function add(){
        $this->authHelper->checkLoggedIn();
        $brand = $_POST['brand'];
        $this->brand_model->insertBrand($brand);
        header("Location: " . BASE_URL); 
    }

    public function delete($id){
        $this->authHelper->checkLoggedIn();
        $this->brand_model->delete($id);
        header("Location: " . BASE_URL); 
    }

    public function edit($id){
        $this->authHelper->checkLoggedIn();
        $brand_name = $_POST['brand_name'];
        $this->brand_model->update($brand_name,$id);
        header("Location: " . BASE_URL); 
    }
}