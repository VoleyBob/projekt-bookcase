<?php

namespace App\Controller;

use App\Entity\BookEntity;
use App\Entity\BookcaseEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\{SubmitType, TextType};
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class BookController extends Controller
{
    public function showBook()
    {
        \dump(get_called_class());
        die();
    }

    public function addBook(Request $request)
    {
        $book = new BookEntity();
        $form = $this->createFormBuilder($book)
            ->add('title', TextType::class)
            ->add('authorName', TextType::class)
            ->add('authorSurname', TextType::class)
            ->add('isbn13', TextType::class)
            ->add('publisher', TextType::class)
            ->add('format', TextType::class)
/*          ->add('bookcase', TextType::class)

            add('users', EntityType::class, array(
                // looks for choices from this entity
                'class' => User::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'username',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ));
*/
            ->add('bookcase', EntityType::class, array(
                'class' => BookcaseEntity::class,
                'choice_label' => 'name',
            ))
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();
            return $this->redirectToRoute('index');
        }
            
        return $this->render('book/new.html.twig', [
            'controller_name' => 'BookController',
            'form' => $form->createView(),
        ]);

    }


}



