<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=24, unique=true)
     */
    private $tipo_habitacion;

}