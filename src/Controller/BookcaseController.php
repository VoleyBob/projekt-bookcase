<?php

namespace App\Controller;

use App\Entity\BookcaseEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookcaseController extends Controller
{
    public function showBookcase()
    {
                
/*        $bookcase = new BookcaseEntity();
        $bookcase->setName('Biblioteka w starym domu');
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($bookcase);
        $entityManager->flush();
*/
        return $this->render('bookcase/list-books-from-bookcase.html.twig');
        \dump(get_called_class());
        die();
    }

    public function addBookcase()
    {
        
        $bookcase = new BookcaseEntity();
        $bookcase->setName('Biblio_2');
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($bookcase);
        $entityManager->flush();

        return $this->redirectToRoute('index');	 //tu jest nazwa routy, a nie widoku
    }



}
