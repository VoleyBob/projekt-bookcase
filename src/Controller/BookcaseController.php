<?php

namespace App\Controller;

use App\Entity\BookEntity;
use App\Entity\BookcaseEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\{SubmitType, TextType};
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BookcaseController extends Controller
{
   /*
    * METODA WYŚWIETLAJĄCA WSZYSTKIE KSIĄŻCE Z DANEJ PÓŁKI
    */
    public function showBookcase($id)
    {
        $books = $this
            ->getDoctrine()
            ->getRepository(BookEntity::class)
            ->findAll();
     #   \dump($books);

        return $this->render('book/list-books-from-bookcase.html.twig', [
            'books' => $books,
        ]);
    }
/*    
    public function showBookcase($id)
    {
        $bookcase = $this
            ->getDoctrine()
            ->getRepository(BookcaseEntity::class)	/// a to odpowiada takiemu zapisowi:->getRepository("App\Entity\BookcaseEntity")
            ->find($id);
#        \dump($bookcase);
        return $this->render('book/list-books-from-bookcase.html.twig');
//        return $this->render('bookcase/list-books-from-bookcase.html.twig');  // tak ma być docelowo z 'bookcase'
    }
*/

/*
    public function addBookcase()
    {
        
        $bookcase = new BookcaseEntity();
        $bookcase->setName('Biblioteczka której nie ma');
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($bookcase);
        $entityManager->flush();

        return $this->redirectToRoute('index');	 //tu jest nazwa routy, a nie widoku
    }
*/


    public function addBookcase(Request $request)
    {
        $bookcase = new BookcaseEntity();
        $form = $this->createFormBuilder($bookcase)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bookcase);
            $entityManager->flush();
            return $this->redirectToRoute('index');
        }
            
        return $this->render('bookcase/new.html.twig', [
            'controller_name' => 'BookcaseController',
            'form' => $form->createView(),
        ]);

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
