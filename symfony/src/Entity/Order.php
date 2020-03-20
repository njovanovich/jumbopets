<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Pet petId thew pet of the order
     * @ORM\ManyToOne(targetEntity="App\Entity\Pet")
     * @ORM\JoinColumn(name="petId", referencedColumnName="id",onDelete="SET NULL")
     */
    private $pet;

    /**
     * @var integer quantity of order
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @var \DateTimeImmutable shipDate date of order shipping
     * @ORM\Column(type="datetime_immutable")
     */
    private $shipDate;

    /**
     * @var string order status
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @var boolean complete - is order completed ?
     * @ORM\Column(type="boolean")
     */
    private $complete;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Pet
     */
    public function getPet(): Pet
    {
        return $this->pet;
    }

    /**
     * @param Pet $pet
     */
    public function setPet(Pet $pet): void
    {
        $this->pet = $pet;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getShipDate(): \DateTimeImmutable
    {
        return $this->shipDate;
    }

    /**
     * @param \DateTimeImmutable $shipDate
     */
    public function setShipDate(\DateTimeImmutable $shipDate): void
    {
        $this->shipDate = $shipDate;
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
     * @return bool
     */
    public function isComplete(): bool
    {
        return $this->complete;
    }

    /**
     * @param bool $complete
     */
    public function setComplete(bool $complete): void
    {
        $this->complete = $complete;
    }


}
