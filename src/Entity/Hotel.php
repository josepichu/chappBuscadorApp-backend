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
     * @ORM\Column(type="direccion", length=255, unique=true)
     */
    private $direccion;

}