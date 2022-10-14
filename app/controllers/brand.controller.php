<?php
require_once './app/models/brand.model.php';
require_once './app/views/view.php';
class BrandController {
    private $brand_model;

    public function __construct() {
        $this->brand_model = new BrandModel();
        $this->view = new PhoneView();
    }


    public function add(){
        $brand = $_POST['brand'];
        $this->brand_model->insertBrand($brand);
        header("Location: " . BASE_URL); 
    }

    public function delete($id){
        $this->brand_model->delete($id);
        header("Location: " . BASE_URL); 
    }

    public function edit($id){
        $brand_name = $_POST['brand_name'];
        $this->brand_model->update($brand_name,$id);
        header("Location: " . BASE_URL); 
    }
}