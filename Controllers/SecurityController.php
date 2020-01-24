<?php

require_once 'AppController.php';
require_once __DIR__ . '//..//Models//User.php';
require_once __DIR__ . '//..//Repository//UserRepository.php';

class SecurityController extends AppController
{

    public function login()
    {
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $user = $userRepository->getUser($email);

            if (!$user) {
                $this->render('login', ['messages' => ['User with this email not exist!']]);
                return;
            }
            if ($user->getPassword() !== $password) {
                $this->render('login', ['messages' => ['Wrong password!']]);
                return;
            }

            $_SESSION["id"] = $user->getEmail();
            $permission=$userRepository->getPermission($user->getId());
            $_SESSION["role"] = $permission;
            $url = "http://$_SERVER[HTTP_HOST]/projekt/";
            header("Location: {$url}?page=board");
            return;
        }

        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('login', ['messages' => ['You have been successfully logged out!']]);
    }

    public function register()
    {
        if ($this->isPost()) {
            if ($_POST['name'] == "" ||
                $_POST['password'] == "" ||
                $_POST['password2'] == "" ||
                $_POST['email'] == "" ||
                $_POST['email2'] == "") {
                $this->render('register', ['messages' => ['Uzupelnij wszystkie dane!']]);
                return;
            }
            if ($_POST['email'] != $_POST['email2']) {
                $this->render('register', ['messages' => ['Emaile sie roznia']]);
                return;
            }
            if ($_POST['password'] != $_POST['password2']) {
                $this->render('register', ['messages' => ['hasla sie roznia']]);
                return;
            }
            $userRepository = new UserRepository();
            $password=md5($_POST['password']);
            $userRepository->addUser($_POST['name'], $_POST['email'],$password);
            $user=$userRepository->getUser($_POST['email']);
            $permission=$userRepository->getPermission($user->getId());
            $_SESSION['id']=$_POST['email'];
            $_SESSION['role'] = $permission;
            $url = "http://$_SERVER[HTTP_HOST]/projekt/";
            header("Location: {$url}?page=board");
            return;
        }
        $this->render('register');
    }
}