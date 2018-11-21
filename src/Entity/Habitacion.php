<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="habitaciones")
 * @ORM\Entity
 */
class Habitacion
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Hotel", inversedBy="habitaciones")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     */
    private $hotel;

    /**
     * @ORM\Column(type="string", length=24, unique=true)
     */
    private $codigo;

    /**
     * @ORM\ManyToOne(targetEntity="TipoHabitacion", inversedBy="habitaciones")
     * @ORM\JoinColumn(name="tipo_habitacion", referencedColumnName="id")
     */
    private $tipo_habitacion;

    /**
     * @ORM\OneToMany(targetEntity="Reserva", mappedBy="habitacion")
     */
    private $reservas;

    public function __construct()
    {
        $this->reservas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTipoHabitacion(): ?string
    {
        return $this->tipo_habitacion;
    }

    public function setTipoHabitacion(string $tipo_habitacion): self
    {
        $this->tipo_habitacion = $tipo_habitacion;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * @return Collection|Reserva[]
     */
    public function getReservas(): Collection
    {
        return $this->reservas;
    }

    public function addReserva(Reserva $reserva): self
    {
        if (!$this->reservas->contains($reserva)) {
            $this->reservas[] = $reserva;
            $reserva->setHabitacion($this);
        }

        return $this;
    }

    public function removeReserva(Reserva $reserva): self
    {
        if ($this->reservas->contains($reserva)) {
            $this->reservas->removeElement($reserva);
            // set the owning side to null (unless already changed)
            if ($reserva->getHabitacion() === $this) {
                $reserva->setHabitacion(null);
            }
        }

        return $this;
    }      

}