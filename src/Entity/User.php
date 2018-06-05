<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookEntity", mappedBy="owner", orphanRemoval=true)
     */
    private $bookEntities;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookEntity", mappedBy="borrower")
     */
    private $bookBorrowEntieties;

    public function __construct()
    {
        parent::__construct();
        $this->bookEntities = new ArrayCollection();
        $this->bookBorrowEntieties = new ArrayCollection();
        // your own logic
    }

    /**
     * @return Collection|BookEntity[]
     */
    public function getBookEntities(): Collection
    {
        return $this->bookEntities;
    }

    public function addBookEntity(BookEntity $bookEntity): self
    {
        if (!$this->bookEntities->contains($bookEntity)) {
            $this->bookEntities[] = $bookEntity;
            $bookEntity->setOwner($this);
        }

        return $this;
    }

    public function removeBookEntity(BookEntity $bookEntity): self
    {
        if ($this->bookEntities->contains($bookEntity)) {
            $this->bookEntities->removeElement($bookEntity);
            // set the owning side to null (unless already changed)
            if ($bookEntity->getOwner() === $this) {
                $bookEntity->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BookEntity[]
     */
    public function getBookBorrowEntieties(): Collection
    {
        return $this->bookBorrowEntieties;
    }

    public function addBookBorrowEntiety(BookEntity $bookBorrowEntiety): self
    {
        if (!$this->bookBorrowEntieties->contains($bookBorrowEntiety)) {
            $this->bookBorrowEntieties[] = $bookBorrowEntiety;
            $bookBorrowEntiety->setBorrower($this);
        }

        return $this;
    }

    public function removeBookBorrowEntiety(BookEntity $bookBorrowEntiety): self
    {
        if ($this->bookBorrowEntieties->contains($bookBorrowEntiety)) {
            $this->bookBorrowEntieties->removeElement($bookBorrowEntiety);
            // set the owning side to null (unless already changed)
            if ($bookBorrowEntiety->getBorrower() === $this) {
                $bookBorrowEntiety->setBorrower(null);
            }
        }

        return $this;
    }
}
