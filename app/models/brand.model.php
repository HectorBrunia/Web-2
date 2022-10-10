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
}