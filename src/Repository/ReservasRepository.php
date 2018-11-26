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

    public function getDisponibilidad($hotel_id, $fecha_entrada, $fecha_salida, $capacidad) {

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
                    thab.jaccuzzi                    

                from App\Entity\Habitacion hab
                join hab.hotel hot
                join hab.tipo_habitacion thab
                where hab.id not in (
                    select 
                        habDisp.id
                    from App\Entity\Reserva r
                    join r.habitacion habDisp
                    join habDisp.tipo_habitacion thabDisp
                    join habDisp.hotel hotDisp
                    where r.fecha_entrada <= :fecha_entrada and r.fecha_salida >= :fecha_salida 
                            and hotDisp.id = :hotel_id
                            and (thabDisp.capacidad >= :capacidad)
                )            
            ")->setParameters(array(
                'fecha_entrada' => $fecha_entrada,
                'fecha_salida' => $fecha_salida,
                'hotel_id' => $hotel_id,
                'capacidad' => $capacidad
            ));

           return $query->getResult();

        } catch (\Exception $e) {
            throw new \Exception("Error obteniendo disponibilidad {$e->getMessage()}");
        }

    }

}
