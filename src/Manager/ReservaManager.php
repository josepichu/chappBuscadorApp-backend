<?php

namespace App\Manager;

use App\Entity\Reserva;
use Doctrine\ORM\EntityManagerInterface;

class ReservaManager
{

    public $em = null;
  
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getDisponibilidad($fecha_entrada, $fecha_salida, $capacidad) {

        $disponibilidad = $this->em->getRepository(Reserva::class)->getDisponibilidad($fecha_entrada, $fecha_salida, $capacidad);

        return $disponibilidad;

    }

}