<?php

namespace App\Manager;

use App\Entity\Reserva;

class ReservaManager
{
  
    public function getDisponibilidad($fecha_inicio, $fecha_fin) {

        $em = $this->getDoctrine()->getManager();

        $disponibilidad = $em->getRepository(Reserva::class)->getDisponiblidad($fecha_inicio, $fecha_fin);

    }

}