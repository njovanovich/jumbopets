<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Category",fetch="EAGER")
     * @ORM\JoinColumn(name="categtory", referencedColumnName="id",onDelete="SET NULL")
     */
    private $category;

    /**
     * @var string name example: doggie
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string photoUrls
     * @ORM\Column(type="string")
     */
    private $photoUrls;

    /**
     * @var Tag[] tags of pet
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag",fetch="EAGER")
     * @ORM\JoinTable(name="pet_tags",
     *      joinColumns={@ORM\JoinColumn(name="pet",referencedColumnName="id",onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag",referencedColumnName="id",onDelete="CASCADE")}
     * )
     */
    private $tags;

    /**
     * @var string status
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Doctrine\ORM\PersistentCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Tag[] $tags
     */
    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @param Tag $tag
     */
    public function addTag(Tag $tag): void
    {
        $this->tags[] = $tag;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function getPhotoUrls(): array
    {
        return explode(",", $this->photoUrls);
    }

    /**
     * @param string[] $photoUrls
     */
    public function setPhotoUrls(array $photoUrls): void
    {
        $this->photoUrls = implode(",", $photoUrls);
    }



}
