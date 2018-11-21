<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="habitaciones_tipo_fotos")
 * @ORM\Entity
 */
class FotoTipoHabitacion
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="TipoHabitacion", inversedBy="fotos")
     * @ORM\JoinColumn(name="tipo_habitacion_id", referencedColumnName="id")
     */
    private $tipo_habitacion;

    /**
     * @ORM\Column(type="string", length=48)
     */
    private $nombre_archivo;      

    /**
     * @ORM\Column(type="boolean", unique=true)
     */
    private $principal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreArchivo(): ?string
    {
        return $this->nombre_archivo;
    }

    public function setNombreArchivo(string $nombre_archivo): self
    {
        $this->nombre_archivo = $nombre_archivo;

        return $this;
    }

    public function getPrincipal(): ?bool
    {
        return $this->principal;
    }

    public function setPrincipal(bool $principal): self
    {
        $this->principal = $principal;

        return $this;
    }

    public function getTipoHabitacion(): ?TipoHabitacion
    {
        return $this->tipo_habitacion;
    }

    public function setTipoHabitacion(?TipoHabitacion $tipo_habitacion): self
    {
        $this->tipo_habitacion = $tipo_habitacion;

        return $this;
    }  

}