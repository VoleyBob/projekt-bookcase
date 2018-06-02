<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function index()
    {
/*      \dump(get_called_class());
        die();
*/
        return $this->render('index.html.twig');
    }

    public function about()
    {
/*      \dump(get_called_class());
        die();
*/
        return $this->render('about.html.twig');
    }



}
