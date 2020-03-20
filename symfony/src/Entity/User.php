<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string username
     * @ORM\Column(type="string",unique=true)
     */
    private $username;

    /**
     * @var string $firstName
     * @ORM\Column(type="string")
     */
    private $firstName;

    /**
     * @var string lastName
     * @ORM\Column(type="string")
     */
    private $lastName;

    /**
     * @var string email
     * @ORM\Column(type="string",unique=true)
     */
    private $email;

    /**
     * @var string password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var string phone
     * @ORM\Column(type="string")
     */
    private $phone;

    /**
     * @var integer user status
     * @ORM\Column(type="integer")
     */
    private $userStatus;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getUserStatus(): int
    {
        return $this->userStatus;
    }

    /**
     * @param int $userStatus
     */
    public function setUserStatus(int $userStatus): void
    {
        $this->userStatus = $userStatus;
    }

    public static function encryptPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function checkPassword($password, $encryptedPassword){
        return password_verify($password, $encryptedPassword);
    }
}
