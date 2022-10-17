<?php
require_once './app/views/view.php';
require_once './app/models/phone.model.php';
require_once './app/helpers/auth.helper.php';

class  PhoneController  {
    private $view;
    private $phone_model;
    private $brand_model;
    private $authHelper;
    public function __construct() {
        $this->phone_model = new PhoneModel();
        $this->brand_model = new BrandModel();
        $this->view = new PhoneView();
        $this->authHelper = new AuthHelper();
    }

    public function add(){
        $this->authHelper->checkLoggedIn();
        $img = $_FILES['imagen']['tmp_name'];
        $model = $_POST['model'];
        $memory = $_POST['memory'];
        $display = $_POST['display'];
        $cpugpu = $_POST['cpugpu'];
        $camera = $_POST['camera'];
        $id_brand = $_POST['id_brand'];
        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
        || $_FILES['imagen']['type'] == "image/png" ) {

            $this->phone_model->insertPhone($model, $memory, $display,$cpugpu,$camera,$id_brand, $img);
        }
        else
            {
            $id = $this->phone_model->insertPhone($model, $memory, $display,$cpugpu,$camera,$id_brand);
            }
        header("Location: " . BASE_URL); 
    }

    public function delete($id){
        $this->authHelper->checkLoggedIn();
        $this->phone_model->deletePhone($id);
        header("Location: " . BASE_URL); 
    }

    public function showFormEdit($id) {
        $loggedin = $this->authHelper->IsLoggedIn();
        $this->authHelper->checkLoggedIn();
        $phone = $this->phone_model->getPhoneById($id);
        $brands = $this->brand_model->getAllBrand();
        $this->view->showFormEdit($phone,$brands,$loggedin);
    }

    public function edit($id){
        $this->authHelper->checkLoggedIn();
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
        header("Location: " . BASE_URL); 
    }
}