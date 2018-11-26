<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="habitaciones_tipo")
 * @ORM\Entity
 */
class TipoHabitacion
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * 
     * referencia a hotel por el requisito de ser configurable a nivel de hotel desde la interfaz (no creo q me de tiempo a implementarlo en interfaz :())
     * 
     * @ORM\Column(type="string", length=128)
     */
    //private $hotel;

    /**
     * @ORM\Column(type="integer", length=2)
     */
    private $capacidad;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $descripcion;    

    /**
     * @ORM\Column(type="integer", length=2)
     */
    private $numero_camas_individuales;

    /**
     * @ORM\Column(type="integer", length=2)
     */
    private $numero_camas_dobles;    
     
    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ducha;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wifi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $television;

     /**
     * @ORM\Column(type="boolean")
     */
    private $aire_acondicionado; 

     /**
     * @ORM\Column(type="boolean")
     */
    private $jaccuzzi;   

    /**
     * @ORM\OneToMany(targetEntity="Habitacion", mappedBy="hotel")
     */
    private $habitaciones;    
    
    /**
     * @ORM\OneToMany(targetEntity="FotoTipoHabitacion", mappedBy="tipo_habitacion")
     */
    private $fotos;

     /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $foto_principal;

    public function __construct()
    {
        $this->fotos = new ArrayCollection();
        $this->habitaciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacidad(): ?int
    {
        return $this->capacidad;
    }

    public function setCapacidad(int $capacidad): self
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getNumeroCamasIndividuales(): ?int
    {
        return $this->numero_camas_individuales;
    }

    public function setNumeroCamasIndividuales(int $numero_camas_individuales): self
    {
        $this->numero_camas_individuales = $numero_camas_individuales;

        return $this;
    }

    public function getNumeroCamasDobles(): ?int
    {
        return $this->numero_camas_dobles;
    }

    public function setNumeroCamasDobles(int $numero_camas_dobles): self
    {
        $this->numero_camas_dobles = $numero_camas_dobles;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getDucha(): ?bool
    {
        return $this->ducha;
    }

    public function setDucha(bool $ducha): self
    {
        $this->ducha = $ducha;

        return $this;
    }

    public function getWifi(): ?bool
    {
        return $this->wifi;
    }

    public function setWifi(bool $wifi): self
    {
        $this->wifi = $wifi;

        return $this;
    }

    public function getTelevision(): ?bool
    {
        return $this->television;
    }

    public function setTelevision(bool $television): self
    {
        $this->television = $television;

        return $this;
    }

    public function getAireAcondicionado(): ?bool
    {
        return $this->aire_acondicionado;
    }

    public function setAireAcondicionado(bool $aire_acondicionado): self
    {
        $this->aire_acondicionado = $aire_acondicionado;

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
     * @return Collection|FotoTipoHabitacion[]
     */
    public function getFotos(): Collection
    {
        return $this->fotos;
    }

    public function addFoto(FotoTipoHabitacion $foto): self
    {
        if (!$this->fotos->contains($foto)) {
            $this->fotos[] = $foto;
            $foto->setTipoHabitacion($this);
        }

        return $this;
    }

    public function removeFoto(FotoTipoHabitacion $foto): self
    {
        if ($this->fotos->contains($foto)) {
            $this->fotos->removeElement($foto);
            // set the owning side to null (unless already changed)
            if ($foto->getTipoHabitacion() === $this) {
                $foto->setTipoHabitacion(null);
            }
        }

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
    

}