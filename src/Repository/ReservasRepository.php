<?php

namespace App\Repository;

use App\Entity\Reserva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Reserva|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reserva|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reserva[]    findAll()
 * @method Reserva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Reserva::class);
    }

    public function getDisponibilidad($fecha_entrada, $fecha_salida, $capacidad) {

        try {

            $em = $this->getEntityManager();
            $query = $em->createQuery("
                select 

                    hot.id,
                    hot.nombre,
                    hot.num_estrellas,
                    hot.direccion,
                    hot.num_piscinas,
                    hot.gimnasio,
                    hot.jaccuzzi,

                    hab.id,
                    hab.codigo,

                    thab.capacidad,
                    thab.descripcion,
                    thab.numero_camas_individuales,
                    thab.numero_camas_dobles,
                    thab.precio,
                    thab.ducha,
                    thab.wifi,
                    thab.television,
                    thab.jaccuzzi,
                    thab.foto_principal,
                    thab.aire_acondicionado                    

                from App\Entity\Habitacion hab
                join hab.hotel hot
                join hab.tipo_habitacion thab
                where hab.id not in (
                    select 
                        habDisp.id
                    from App\Entity\Reserva r
                    join r.habitacion habDisp
                    join habDisp.hotel hotDisp
                    where ((r.fecha_entrada < :fecha_entrada and r.fecha_salida > :fecha_salida) or
                        (r.fecha_entrada < :fecha_salida and r.fecha_salida > :fecha_salida) or
                        (:fecha_entrada between r.fecha_entrada and r.fecha_salida and :fecha_salida between r.fecha_entrada and r.fecha_salida ) or
                        (r.fecha_entrada < :fecha_entrada and r.fecha_salida > :fecha_salida))

                ) and thab.capacidad >= :capacidad and :fecha_salida >= :fecha_entrada            
            ")->setParameters(array(
                'fecha_entrada' => $fecha_entrada,
                'fecha_salida' => $fecha_salida,
                //'hotel_id' => $hotel_id,
                'capacidad' => $capacidad
            ));

           return $query->getResult();

        } catch (\Exception $e) {
            throw new \Exception("Error obteniendo disponibilidad {$e->getMessage()}");
        }

    }

    public function getReservasUsuario($usuario) {

        try {

            $em = $this->getEntityManager();
            $query = $em->createQuery("
                select 


                    r.localizador,
                    r.fecha_entrada,
                    r.fecha_salida,
                    r.email as email_contacto,
                    r.numero_telefono_contacto as telefono_contacto,
                    r.numero_tarjeta_credito as tarjeta_credito,
                    r.id as id,
                    r.total,

                    hab.id as habitacion_id,
                    hab.codigo,

                    thab.capacidad,
                    thab.descripcion,
                    thab.numero_camas_individuales,
                    thab.numero_camas_dobles,
                    thab.precio,
                    thab.ducha,
                    thab.wifi,
                    thab.television,
                    thab.jaccuzzi,
                    thab.foto_principal,
                    thab.aire_acondicionado                    

                from App\Entity\Reserva r
                join r.habitacion hab
                join hab.tipo_habitacion thab
                where r.usuario = :usuario         
            ")->setParameters(array(
                'usuario' => $usuario
            ));

           return $query->getResult();

        } catch (\Exception $e) {
            throw new \Exception("Error obteniendo reservas usuario {$e->getMessage()}");
        }

    }    

}
