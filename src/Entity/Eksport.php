<?php

namespace App\Entity;

use App\Repository\EksportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EksportRepository::class)
 */
class Eksport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwa;

    /**
     * @ORM\Column(type="date")
     */
    private $data;

    /**
     * @ORM\Column(type="time")
     */
    private $godzina;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $uzytkownik;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lokal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setNazwa(string $nazwa): self
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getGodzina(): ?\DateTimeInterface
    {
        return $this->godzina;
    }

    public function setGodzina(\DateTimeInterface $godzina): self
    {
        $this->godzina = $godzina;

        return $this;
    }

    public function getUzytkownik(): ?string
    {
        return $this->uzytkownik;
    }

    public function setUzytkownik(string $uzytkownik): self
    {
        $this->uzytkownik = $uzytkownik;

        return $this;
    }

    public function getLokal(): ?string
    {
        return $this->lokal;
    }

    public function setLokal(string $lokal): self
    {
        $this->lokal = $lokal;

        return $this;
    }

    public function __toString()
    {
        return $this->getLokal();
    }

}
