<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="reservas")
 * @ORM\Entity
 */
class Reserva
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=48, unique=true)
     */
    private $localizador;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reservas")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="Habitacion", inversedBy="reservas")
     * @ORM\JoinColumn(name="habitacion_id", referencedColumnName="id")
     */
    private $habitacion;    

}