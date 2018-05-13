<?php

namespace App\Controller;

use App\Entity\BookcaseEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookcaseController extends Controller
{
    public function showBookcase($id)
    {
        $bookcase = $this
            ->getDoctrine()
            ->getRepository(BookcaseEntity::class)	/// a to odpowiada takiemu zapisowi:->getRepository("App\Entity\BookcaseEntity")
            ->find($id);
        \dump($bookcase);

        return $this->render('bookcase/list-books-from-bookcase.html.twig');
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

    public function showBookcases()
    {
        $bookcases = $this
            ->getDoctrine()
            ->getRepository(BookcaseEntity::class)
            ->findAll();
        \dump($bookcases);

        return $this->render('bookcase/list-bookcases.html.twig', [
            'bookcases' => $bookcases,
        ]);
    }


}
