<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="hoteles")
 * @ORM\Entity
 */
class Hotel
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=24, unique=true)
     */
    private $codigo;    

    /**
     * @ORM\Column(type="string", length=128, unique=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_estrellas;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $direccion;

    /**
     * @ORM\OneToMany(targetEntity="Habitacion", mappedBy="hotel")
     */
    private $habitaciones;

    /**
     * @ORM\Column(type="integer", length=2)
     */
    private $num_piscinas;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gimnasio;    

    /**
     * @ORM\Column(type="boolean")
     */
    private $jaccuzzi;

    public function __construct()
    {
        $this->habitaciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNumEstrellas(): ?int
    {
        return $this->num_estrellas;
    }

    public function setNumEstrellas(int $num_estrellas): self
    {
        $this->num_estrellas = $num_estrellas;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getNumPiscinas(): ?int
    {
        return $this->num_piscinas;
    }

    public function setNumPiscinas(int $num_piscinas): self
    {
        $this->num_piscinas = $num_piscinas;

        return $this;
    }

    public function getGimnasio(): ?bool
    {
        return $this->gimnasio;
    }

    public function setGimnasio(bool $gimnasio): self
    {
        $this->gimnasio = $gimnasio;

        return $this;
    }

    public function getJaccuzzi(): ?bool
    {
        return $this->jaccuzzi;
    }

    public function setJaccuzzi(bool $jaccuzzi): self
    {
        $this->jaccuzzi = $jaccuzzi;

        return $this;
    }

    /**
     * @return Collection|Habitacion[]
     */
    public function getHabitaciones(): Collection
    {
        return $this->habitaciones;
    }

    public function addHabitacione(Habitacion $habitacione): self
    {
        if (!$this->habitaciones->contains($habitacione)) {
            $this->habitaciones[] = $habitacione;
            $habitacione->setHotel($this);
        }

        return $this;
    }

    public function removeHabitacione(Habitacion $habitacione): self
    {
        if ($this->habitaciones->contains($habitacione)) {
            $this->habitaciones->removeElement($habitacione);
            // set the owning side to null (unless already changed)
            if ($habitacione->getHotel() === $this) {
                $habitacione->setHotel(null);
            }
        }

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }    

}