<?php

class PhoneModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_phones;charset=utf8', 'root', '');
    }

    public function getAllPhones() {
        $query = $this->db->prepare("SELECT phones.*, brands.brand_name as brand FROM phones JOIN brands ON phones.id_brand = brands.id_brand");
        $query->execute();
        $phones = $query->fetchAll(PDO::FETCH_OBJ);
        return $phones;
    }

    public function getPhoneById($id) {
        $query = $this->db->prepare("SELECT phones.*, brands.brand_name as brand FROM phones JOIN brands ON phones.id_brand = brands.id_brand WHERE id = $id");
        $query->execute();
        $phone = $query->fetch(PDO::FETCH_OBJ);
        
        return $phone;
    }
    

    public function insertPhone($img, $model, $memory, $display,$cpugpu,$camera,$id_brand,) {
        $query = $this->db->prepare("INSERT INTO phones (img, model, memory, display, cpugpu, camera, id_brand) VALUES (?, ?, ?, ?, ?,?,?)");
        $query->execute([$img, $model, $memory, $display, $cpugpu, $camera, $id_brand]);
    }

    public function updatePhone($id,$img, $model, $memory, $display,$cpugpu,$camera,$id_brand,) {
        $query = $this->db->prepare("UPDATE phones  (img, model, memory, display, cpugpu, camera, id_brand) VALUES (?, ?, ?, ?, ?,?,?) WHERE id = $id");
        $query->execute([$img, $model, $memory, $display, $cpugpu, $camera, $id_brand]);
    }

    public function insertBrand($brand) {
        $query = $this->db->prepare("INSERT INTO brands (brand_name) VALUES (?)");
        $query->execute([$brand]);
    }
    function deletePhone($id) {
        $query = $this->db->prepare('DELETE FROM phones WHERE phones . id = ?');
        $query->execute([$id]);
    }

}