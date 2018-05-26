<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function login()
    {
    /*  \dump(get_called_class());
        die();
    */ 
        return $this->render('user/login.html.twig');
    }

    public function profile()
    {
        \dump(get_called_class());
        die();
    }
}

