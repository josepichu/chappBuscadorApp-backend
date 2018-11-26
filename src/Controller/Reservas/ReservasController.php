<?php
namespace App\Controller\Reservas;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\ApiController;
use App\Manager\ReservaManager;
use Symfony\Component\HttpFoundation\Request;
use App\Utils\DateTimeUtil;

class ReservasController extends ApiController
{
    /**
     * @Route("/disponibilidad", methods={"POST"}, name="reservas.disponibilidad")
     */
    public function disponibilidad(ReservaManager $reservaManager, Request $request)
    {
      
        try {

            $datos_reserva = json_decode($request->getContent(), true);

            if (!isset($datos_reserva['fecha_entrada']) || !DateTimeUtil::validateDate($datos_reserva['fecha_entrada'])) throw new \Exception('fecha entrada inválida');
            if (!isset($datos_reserva['fecha_salida']) || !DateTimeUtil::validateDate($datos_reserva['fecha_salida']))  throw new \Exception('fecha salida inválida');
            // TODO: multi hotel
            //if (!isset($datos_reserva['hotel_id'])) throw new \Exception('Debe especificar el código del hotel');
            if (!isset($datos_reserva['numero_adultos']) || !isset($datos_reserva['numero_peques']) 
            || ($datos_reserva['numero_adultos'] + $datos_reserva['numero_peques'] ==0)) throw new \Exception('Debe especificar el número de huéspedes');

            $capacidad = $datos_reserva['numero_adultos'] + $datos_reserva['numero_peques'];

            $disponibilidad = $reservaManager->getDisponibilidad(
                $datos_reserva['fecha_entrada'], 
                $datos_reserva['fecha_salida'],
                $capacidad
            );

            return $this->respond($disponibilidad);

        } catch (\Exception $e) {
            return $this->respondWithErrors($e->getMessage());
        }

    }
}