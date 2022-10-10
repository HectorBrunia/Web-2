<?php
require_once './app/models/phone.model.php';
require_once './app/models/brand.model.php';
require_once './app/views/view.php';

class PhoneController {
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

    function addPhone() {
        $img = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
        $model = $_POST['model'];
        $memory = $_POST['memory'];
        $display = $_POST['display'];
        $cpugpu = $_POST['cpugpu'];
        $camera = $_POST['camera'];
        $id_brand = $_POST['id_brand'];
        $this->phone_model->insertPhone($img, $model, $memory, $display,$cpugpu,$camera,$id_brand,);
        header("Location: " . BASE_URL."/admin "); 
    }
    function addBrand() {
        $brand = $_POST['brand'];
        $this->phone_model->insertBrand($brand);
        header("Location: " . BASE_URL."/admin "); 
    }
    
    function deletePhone($id) {
        $this->phone_model->deletePhone($id);
        header("Location: " . BASE_URL."/admin "); 
    }
    public function showFormEdit($id) {
        $phone = $this->phone_model->getPhoneById($id);
        $this->view->showFormEdit($phone);
    }

    function editPhone($id) {
        $img = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
        $model = $_POST['model'];
        $memory = $_POST['memory'];
        $display = $_POST['display'];
        $cpugpu = $_POST['cpugpu'];
        $camera = $_POST['camera'];
        $id_brand = $_POST['id_brand'];
        $this->phone_model->updatePhone($id, $img, $model, $memory, $display,$cpugpu,$camera,$id_brand);
        header("Location: " . BASE_URL); 
    }
}