<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User 
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['iduser']
        );
    }

    public function getUsers(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                $user['email'],
                $user['password'],
                $user['name'],
                $user['iduser']
            );
        }

        return $result;
    }

    public function addUser(string $name, string $email, string $password)
    {
        $con=$this->database->connect();
        $stmt=$con->prepare("INSERT INTO users VALUES(NULL,'$name','$email','$password')");
        $stmt->execute();
    }
    public function getPermission(int $id){
        $con=$this->database->connect();
        $stmt=$con->prepare("SELECT p.name FROM permission p,userpermission up WHERE p.idpermission=up.idpermission and up.iduser='$id'");
        $stmt->execute();
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $result=[];
        foreach ($res as $r){
            array_push($result,$r['name']);
        }


        return $result;
    }
}