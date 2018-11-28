<?php

namespace App\Manager;

use App\Entity\Reserva;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Habitacion;
use App\Entity\User;

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

    public function nuevaReserva($datos_reserva, $user) {

        try {

            $reserva = new Reserva();
            $reserva->setEmail($datos_reserva['email_contacto']);
            $reserva->setFechaEntrada(new \DateTime($datos_reserva['fecha_entrada']));
            $reserva->setFechaSalida(new \DateTime($datos_reserva['fecha_salida']));
            $reserva->setNumeroTelefonoContacto((int)$datos_reserva['telefono_contacto']);
            $reserva->setNumeroTarjetaCredito($datos_reserva['tarjeta_credito']);
            $reserva->setTotal($datos_reserva['total']);
            $reserva->setFechaReserva(new \DateTime());

            $hab = $this->em->getRepository(Habitacion::class)->find($datos_reserva['habitacion']['id']);
            $reserva->setHabitacion($hab);
            
            $reserva->setUsuario($user);

            $this->em->persist($reserva);

            $this->em->flush();

            return $reserva;

        } catch (\Exception $e) {
            throw new \Exception ("error al crear nueva reserva {$e->getMessage()}");
        }        

    }
     
    public function getReservasUsuario($usuario) {

        try {

            return $this->em->getRepository(Reserva::class)->getReservasUsuario($usuario);

        } catch (\Exception $e) {
            throw new \Exception ("error al obtener reservas del usuario {$e->getMessage()}");
        }


    }

}