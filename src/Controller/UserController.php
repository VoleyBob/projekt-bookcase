<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function login()
    {
        \dump(get_called_class());
        die();
    }

    public function showUserDetails()
    {
        \dump(get_called_class());
        die();
    }
}

