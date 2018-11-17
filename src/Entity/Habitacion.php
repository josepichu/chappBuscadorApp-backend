<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="habitaciones")
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
     * @ORM\Column(type="string", length=128)
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