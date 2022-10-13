<?php

class BrandModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_phones;charset=utf8', 'root', '');
    }
    public function getAllBrand() {
        $query = $this->db->prepare("SELECT * FROM brands");
        $query->execute();
        $brands = $query->fetchAll(PDO::FETCH_OBJ);
        return $brands;
    }
    
    public function insertBrand($brand) {
        $query = $this->db->prepare("INSERT INTO brands (brand_name) VALUES (?)");
        $query->execute([$brand]);
    }

    public function delete($id) {
        $query = $this->db->prepare(" DELETE FROM brands WHERE  id_brand = ?");
        $query->execute([$id]);
    }

    public function update($brnad_name,$id) {
        $query = $this->db->prepare(" UPDATE brands SET brand_name=? WHERE  id_brand = ?");
        $query->execute([$brnad_name,$id]);
    }
}