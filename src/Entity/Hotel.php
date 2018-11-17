<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer", length=2, nullable=true)
     */
    private $num_piscinas;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gimnasio;    

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $jaccuzzi;    

}