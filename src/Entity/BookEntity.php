<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookEntityRepository")
 */
class BookEntity
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
    private $title;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $authorName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $authorSurname;

    /**
     * @ORM\Column(type="string", length=13)
     */
    private $isbn13;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $publisher;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $format;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BookcaseEntity", inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bookcase;

    
    public function __toString(): string
    {
        return $this->getTitle(). ' (' . $this->getId() . ')';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthorName(): ?string
    {
        return $this->authorName;
    }

    public function setAuthorName(string $authorName): self
    {
        $this->authorName = $authorName;

        return $this;
    }

    public function getAuthorSurname(): ?string
    {
        return $this->authorSurname;
    }

    public function setAuthorSurname(string $authorSurname): self
    {
        $this->authorSurname = $authorSurname;

        return $this;
    }

    public function getIsbn13(): ?string
    {
        return $this->isbn13;
    }

    public function setIsbn13(string $isbn13): self
    {
        $this->isbn13 = $isbn13;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getBookcase(): ?BookcaseEntity
    {
        return $this->bookcase;
    }

    public function setBookcase(?BookcaseEntity $bookcase): self
    {
        $this->bookcase = $bookcase;

        return $this;
    }
}
