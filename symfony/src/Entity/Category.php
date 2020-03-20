<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var naqme name of category
     * @ORM\Column(type="string")
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return naqme
     */
    public function getName(): naqme
    {
        return $this->name;
    }

    /**
     * @param naqme $name
     */
    public function setName(naqme $name): void
    {
        $this->name = $name;
    }

    
}
