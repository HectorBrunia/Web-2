<?php
require_once './app/views/view.php';
require_once './app/models/phone.model.php';

class  PhoneController  {
    private $view;
    private $phone_model;

    public function __construct() {
        $this->phone_model = new PhoneModel();
        $this->brand_model = new BrandModel();
        $this->view = new PhoneView();
    }

    public function add(){
        $img = $_FILES['imagen']['tmp_name'];
        $model = $_POST['model'];
        $memory = $_POST['memory'];
        $display = $_POST['display'];
        $cpugpu = $_POST['cpugpu'];
        $camera = $_POST['camera'];
        $id_brand = $_POST['id_brand'];
        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
        || $_FILES['imagen']['type'] == "image/png" ){
            $this->phone_model->insertPhone($model, $memory, $display,$cpugpu,$camera,$id_brand, $img);
        }
        else{
            $this->phone_model->insertPhone($model, $memory, $display,$cpugpu,$camera,$id_brand);
        }
        header("Location: " . BASE_URL ."admin"); 
    }

    public function delete($id){
        $this->phone_model->deletePhone($id);
        header("Location: " . BASE_URL."/admin "); 
    }

    public function showFormEdit($id) {
        $phone = $this->phone_model->getPhoneById($id);
        $brands = $this->brand_model->getAllBrand();
        $this->view->showFormEdit($phone,$brands);
    }

    public function edit($id){
        $phone = $this->phone_model->getPhoneById($id);
        $this->phone_model->deleteImage($phone);
        $img = $_FILES['imagen']['tmp_name'];
        $model = $_POST['model'];
        $memory = $_POST['memory'];
        $display = $_POST['display'];
        $cpugpu = $_POST['cpugpu'];
        $camera = $_POST['camera'];
        $id_brand = $_POST['id_brand'];
        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
        || $_FILES['imagen']['type'] == "image/png" ){
            $this->phone_model->updatePhone($id, $model, $memory, $display,$cpugpu,$camera,$id_brand, $img);
        }
        else{
            $this->phone_model->updatePhone($id, $model, $memory, $display,$cpugpu,$camera,$id_brand);
        }
        header("Location: " . BASE_URL ."admin"); 
    }
}