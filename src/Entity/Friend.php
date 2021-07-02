<?php

namespace App\Entity;

use App\Repository\FriendRepository;
use App\System\ClockInterface;
use App\System\SystemClock;
use Doctrine\ORM\Mapping as ORM;
use http\Exception\InvalidArgumentException;

/**
 * @ORM\Entity(repositoryClass=FriendRepository::class)
 */
class Friend
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $FirsName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $LastName;

    /**
     * @ORM\Column(type="date")
     */
    private $BirthDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $Tags;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=8, nullable=true)
     *
     */
    private $Price;

    /**
     * @var ClockInterface
     */
    private $clock;

    public function __construct() {
        $this->clock = new SystemClock();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirsName(): ?string
    {
        return $this->FirsName;
    }

    public function setFirsName(?string $FirsName): self
    {
        $this->FirsName = $FirsName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getPriceTaxInc(Vat $vat) : float
    {
        return $this->Price * (1+$vat->getRate());
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->BirthDate;
    }


    public function setClock(ClockInterface $clock) {
        $this->clock = $clock;
    }

    public function setBirthDate(\DateTimeInterface $BirthDate): self
    {
        if($BirthDate > $this->clock->getNow()) {
            throw new \InvalidArgumentException("Birth date must be in the past");
        }
        $this->BirthDate = $BirthDate;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTags(): ?string
    {
        return $this->Tags;
    }

    public function setTags(?string $Tags): self
    {
        if($Tags==="") {
            throw new \InvalidArgumentException("Tags cannot be empty");
        }
        $this->Tags = $Tags;
        return $this;
    }

    public function getTagNum(): int
    {
        return $this->Tags===null ? 0 : count(explode(',', $this->Tags));
    }
}
