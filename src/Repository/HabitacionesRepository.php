<?php

namespace App\Repository;

use App\Entity\Habitacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Habitacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Habitacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Habitacion[]    findAll()
 * @method Habitacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HabitacionesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Habitacion::class);
    }

    public function getHabitacionInfo($habitacion_id) {

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
                where hab.id = :habitacion_id            
            ")->setParameters(array(
                'habitacion_id' => $habitacion_id
            ));

           return $query->getResult();

        } catch (\Exception $e) {
            throw new \Exception("Error obteniendo info habitación {$e->getMessage()}");
        }
    }
}
