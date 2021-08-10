<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
    
/**
 * @ORM\Entity(repositoryClass="App\Repository\ExportsRepository")
 * @ORM\Table(name="exports")
 */
class Exports
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $name;
    
    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $createdAt;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $username;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $localname;
    
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }
    
    public function __serialize() : array
    {
        return [
            'name' => $this->name
        ];
    }
    
    public function getId() : ?int
    {
        return $this->id;
    }
    
    public function setName(string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    public function getName() : string
    {
        return $this->name;
    }
    
    public function setCreatedAt(\DateTime $createdAt) : self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedAt() : ?\DateTime
    {
        return $this->createdAt;
    }
    
    public function setUsername(string $username) : self
    {
        $this->username = $username;

        return $this;
    }

    public function getUsername() : string
    {
        return $this->username;
    }
    
    public function setLocalname(string $localname) : self
    {
        $this->localname = $localname;

        return $this;
    }

    public function getLocalname() : string
    {
        return $this->localname;
    }
}
