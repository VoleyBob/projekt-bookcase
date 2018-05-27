<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{

    public function deleteUser($id)
    {
        $user = $this->getDoctrine()->getRepository(UserEntity::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();
        return $this->redirectToRoute('fos_user_security_logout');
    }

    // Te metody poniżej to ze starej koncepcji
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

