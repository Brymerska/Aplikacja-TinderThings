<?php

require_once 'AppController.php';


class AdminController extends AppController
{
    public function index()
    {
        $this->render('index');
    }

}
?>