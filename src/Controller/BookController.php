<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookController extends Controller
{
    public function showBook()
    {
        \dump(get_called_class());
        die();
    }
}

