<?php

namespace App\Controller;

use App\Entity\{BookEntity, BookcaseEntity};
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\{SubmitType, TextType, DateType, NumberType, CheckboxType, TextareaType};
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class BookController extends Controller
{
   /*
    * METODA WYŚWIETLAJĄCA INFORMACJE O KSIĄŻCE Z BAZY DANYCH
    */
    public function showBook($id)
    {
#        \dump(get_called_class());
#        die();

        $book = $this
            ->getDoctrine()
            ->getRepository(BookEntity::class)
            ->find($id);
 #       \dump($book);
    
        return $this->render('book/show-book.html.twig');
    }

   /*
    * METODA WYŚWIETLAJĄCA WSZYSTKIE KSIĄŻKI Z DANEJ PÓŁKI
    */
    public function showBooks()
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

    public function addBook(Request $request)
    {
        $book = new BookEntity();  // tworzę obiekt na bazie encji  BookEntity - mam dzięki temu dostęp do wszystkich pól tej encji
        $form = $this->createFormBuilder($book)  // wywołuję FormBuilder'a, który odpowiada za generowanie formularza
            ->add('title', TextType::class, array('label' => 'Book’s title'))  // generuję pola tekstowe
            ->add('authorName', TextType::class, array('label' => 'Author’s first name'))
            ->add('authorSurname', TextType::class, array('label' => 'Author’s last name'))
            ->add('isbn13', TextType::class, array('label' => '13 digit ISBN code'))
            ->add('publisher', TextType::class, array('label' => 'Publisher'))
            ->add('format', TextType::class, array('label' => 'Book’s format [A4, A5, B5]'))
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
            ->add('bookcase', EntityType::class, array( // łączę się z encją BookcaseEntity i odczytuję dozwolone 'półki'
                'label' => 'Choose your own bookcase',
                'class' => BookcaseEntity::class,
                'choice_label' => 'name',
            ))
            ->add('save', SubmitType::class) // generuję przycisk submit
            ->getForm(); // generuję formularz

        $form->handleRequest($request); // do mojego formularza podpinam teraz metodę request, która w parametrze pobierze wszystkie dane jakie podano w formularzu
        
        if($form->isSubmitted() && $form->isValid()) {   // sprawdzam czy wysłano formularz i czy pola przeszły walidację
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


    public function removeBook(int $id)      // kod jest chroniony przed INCJECTION; jeszcze lepiej: INT
    {
        $book = $this
        ->getDoctrine()
        ->getRepository(BookEntity::class)
        ->find($id);

    #    \dump($book);

        $em = $this->getDoctrine()->getManager();
        $em->remove($book);
        $em->flush();

        return $this->redirectToRoute('books');                              //   tak prawidłowo
    
    }



}
