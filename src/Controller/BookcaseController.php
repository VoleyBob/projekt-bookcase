<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookcaseController extends Controller
{
    public function listBooksFromBookcase()
    {
        \dump(get_called_class());
        die();
    }
}
