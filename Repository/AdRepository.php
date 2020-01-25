<?php

require_once "Repository.php";

class AdRepository extends Repository
{
    public function getCity()
    {
        $con = $this->database->connect();
        $stmt = $con->prepare("SELECT * FROM city");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategory()
    {
        $con = $this->database->connect();
        $stmt = $con->prepare("SELECT * FROM category");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAd(string $name, string $description, string $namefile, int $city, int $category, int $user)
    {
        $con = $this->database->connect();
        $stmt = $con->prepare("INSERT INTO ad VALUES(NULL,'$name','$description', '$namefile', '$city', '$category', '$user',1)");
        $stmt->execute();

    }

    public function getAds()
    {
        $con = $this->database->connect();
        $stmt = $con->prepare("SELECT * FROM adver");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAd(int $idAd)
    {
        $con = $this->database->connect();
        $stmt = $con->prepare("SELECT a.idad,
                                               a.name as name,
                                               a.description,
                                               a.namefile,
                                               c.name as city,
                                               ca.name as category,
                                               u.name as username,
                                               a.available
                                        FROM ad a,category ca, city c, users u
                                        WHERE a.idcategory=ca.idcategory AND
                                              a.idcity=c.idcity AND
                                              a.iduser=u.iduser AND 
                                              a.idad='$idAd';");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buyAd(int $idAd, int $idUser)
    {
        $con = $this->database->connect();
        $con->beginTransaction();
        try {
            $res = $this->getAd($idAd);
            var_dump($res);
            if ($res['available'] == 0) {
                throw new Exception("Ktos juz wzial towar");
            }
            $stmt = $con->prepare("UPDATE ad SET available=0 WHERE idad='$idAd'");
            $stmt->execute();
            $stmt = $con->prepare("INSERT INTO userad VALUES(NULL,'$idAd','$idUser') ");
            $stmt->execute();

            $con->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            $con->rollBack();


        }
        return "Pomyślnie zabrano";
    }

}