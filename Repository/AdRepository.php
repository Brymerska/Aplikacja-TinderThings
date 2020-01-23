<?php

require_once "Repository.php";

class AdRepository extends Repository
{
    public function getCity()
    {
        $con=$this->database->connect();
        $stmt=$con->prepare("SELECT * FROM city");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCategory()
    {
        $con=$this->database->connect();
        $stmt=$con->prepare("SELECT * FROM category");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addAd(string $name, string $description, string $namefile, int $city,  int $category, int $user){
        $con=$this->database->connect();
        $stmt=$con->prepare("INSERT INTO ad VALUES(NULL,'$name','$description', '$namefile', '$city', '$category', '$user',1)");
        $stmt->execute();

    }

    public function getAds()
    {
        $con=$this->database->connect();
        $stmt=$con->prepare("SELECT * FROM adver");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}