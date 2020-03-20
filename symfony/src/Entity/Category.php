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
     * @var name name of category
     * @ORM\Column(type="string")
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return name
     */
    public function getName(): name
    {
        return $this->name;
    }

    /**
     * @param name $name
     */
    public function setName(name $name): void
    {
        $this->name = $name;
    }



}
