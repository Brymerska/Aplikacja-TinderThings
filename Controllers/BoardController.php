<?php

require_once 'AppController.php';
require_once __DIR__ . '//..//Models//User.php';
require_once __DIR__ . '//..//Repository//UserRepository.php';
require_once __DIR__ . '//..//Repository//AdRepository.php';

class BoardController extends AppController
{

    public function board()
    {
        $userRepository = new UserRepository();
        $users = $userRepository->getUsers();
        $adRepository = new AdRepository();
        $category=$adRepository->getCategory();
        $city=$adRepository->getCity();
        $this->render('board', [
            'users' => $users,
            'category'=> $category,
            'city' => $city
        ]);
    }

    public function addAd()
    {
        if ($this->isPost()) {
            if ($_POST['name'] == "" || $_POST['description'] == ""){
                $this->render('board', ['messages' => ['uzupelnij wszystkie pola']]);
                return;
            }
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            //echo $target_dir . "\n";
            //echo $target_file . "\n";
            //echo $_POST['name'] . "\n";
            //echo "DESC: ".$_POST['description'] . "\n";
            //echo $_POST['city'] . "\n";
            //echo $_POST['category'] . "\n";
            $namefile=basename($_FILES["img"]["name"]);
            //echo $namefile;
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
            $userRepository= new UserRepository();
            $user=$userRepository->getUser($_SESSION['id']);
            $adRepository = new AdRepository();
            $category=$adRepository->getCategory();
            $city=$adRepository->getCity();
            $adRepository->addAd($_POST['name'],$_POST['description'],$namefile,$_POST['city'],$_POST['category'],$user->getId());
            $this->render('board', [
                'messages' => ['Pomyslnie dodano zgloszenie'],
                'users' => $user,
                'category'=> $category,
                'city' => $city]);
            return;
        }
        $url = "http://$_SERVER[HTTP_HOST]/projekt/";
        header("Location: {$url}?page=board");
        return;

    }

    public function showAd()
    {
        $userRepository = new UserRepository();
        $users = $userRepository->getUsers();
        $adRepository = new AdRepository();
        $ads=$adRepository->getAds();
        $this->render('ad', [
            'user' => $users,
            'ads'=> $ads
        ]);
    }

}