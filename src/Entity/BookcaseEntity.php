<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookcaseEntityRepository")
 */
class BookcaseEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookEntity", mappedBy="bookcase")
     */
    private $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getName(). ' (' . $this->getId() . ')';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|BookEntity[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(BookEntity $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setBookcase($this);
        }

        return $this;
    }

    public function removeBook(BookEntity $book): self
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            // set the owning side to null (unless already changed)
            if ($book->getBookcase() === $this) {
                $book->setBookcase(null);
            }
        }

        return $this;
    }
}
