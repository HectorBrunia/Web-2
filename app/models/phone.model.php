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

    public function insertPhone($model, $memory, $display,$cpugpu,$camera,$id_brand) {
        $query = $this->db->prepare("INSERT INTO phones (model, memory, display, cpugpu, camera, id_brand) VALUES (?, ?, ?, ?,?,?)");
        $query->execute([$model, $memory, $display, $cpugpu, $camera, $id_brand]);
    }
    public function insertPhoneWhitImage($model, $memory, $display,$cpugpu,$camera,$id_brand, $img = null) {
        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img);
        $query = $this->db->prepare("INSERT INTO phones (img, model, memory, display, cpugpu, camera, id_brand) VALUES (?, ?, ?, ?, ?,?,?)");
        $query->execute([$pathImg, $model, $memory, $display, $cpugpu, $camera, $id_brand]);
    }

    private function uploadImage($img){
        $target = 'img/' . uniqid() . '.jpg';
        move_uploaded_file($img, $target);
        return $target;
    }

    public function updatePhone($id, $model, $memory, $display, $cpugpu, $camera, $id_brand) {
        $query = $this->db->prepare("UPDATE phones  SET model=?, memory=?, display=?, cpugpu=?, camera=?, id_brand=?  WHERE id = ?");
        $query->execute([$model, $memory, $display, $cpugpu, $camera, $id_brand,$id]);
    }
    public function updatePhoneWhitImage($id, $model, $memory, $display, $cpugpu, $camera, $id_brand, $img=null) {
        $phone = $this->getPhoneById($id);
        unlink($phone->img);
        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img);
        $query = $this->db->prepare("UPDATE phones  SET img=?, model=?, memory=?, display=?, cpugpu=?, camera=?, id_brand=?  WHERE id = ?");
        $query->execute([$pathImg, $model, $memory, $display, $cpugpu, $camera, $id_brand,$id]);
    }

    function deletePhone($phone) {
        $query = $this->db->prepare('DELETE FROM phones WHERE phones . id = ?');
        $query->execute([$phone->id]);
    }

}