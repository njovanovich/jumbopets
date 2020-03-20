<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PetRepository")
 */
class Pet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var Category category of pet
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(name="categtory", referencedColumnName="id",onDelete="SET NULL")
     */
    private $category;

    /**
     * @var name example: doggie
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var text photoUrls
     * @ORM\Column(type="text")
     */
    private $photoUrls;

    /**
     * @var text tags of pet
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag")
     * @ORM\JoinTable(name="pet_tags",
     *      joinColumns={@ORM\JoinColumn(name="tag",referencedColumnName="id",onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="pet",referencedColumnName="id",onDelete="CASCADE")}
     * )
     */
    private $tags;

    /**
     * @var integer status
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
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

    /**
     * @return text
     */
    public function getPhotoUrls(): text
    {
        return $this->photoUrls;
    }

    /**
     * @param text $photoUrls
     */
    public function setPhotoUrls(text $photoUrls): void
    {
        $this->photoUrls = $photoUrls;
    }

    /**
     * @return text
     */
    public function getTags(): text
    {
        return $this->tags;
    }

    /**
     * @param text $tags
     */
    public function setTags(text $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }


}
