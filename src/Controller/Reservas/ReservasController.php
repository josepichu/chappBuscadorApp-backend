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
     * @Route("/api/disponibilidad", methods={"POST"}, name="reservas.disponibilidad")
     */
    public function disponibilidad(ReservaManager $reservaManager, Request $request)
    {
      
        try {

            $datos_reserva = json_decode($request->getContent(), true);

            if (!isset($datos_reserva['fecha_inicio']) || !DateTimeUtil::validateDate($datos_reserva['fecha_inicio'])) throw new \Exception('fecha inicio inválida');
            if (!isset($datos_reserva['fecha_fin']) || !DateTimeUtil::validateDate($datos_reserva['fecha_fin']))  throw new \Exception('fecha fin inválida');

            $disponibilidad = $reservaManager->getDisponibilidad($datos_reserva['fecha_inicio'], $datos_reserva['fecha_fin']);

            return $this->respond($disponibilidad);

        } catch (\Exception $e) {
            return $this->respondWithErrors($e->getMessage());
        }

    }
}