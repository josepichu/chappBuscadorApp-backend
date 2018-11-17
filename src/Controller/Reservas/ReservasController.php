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

            $dato_reserva = json_decode($request->getContent());

            if (!isset($dato_reserva['fecha_inicio']) || !DateTimeUtil::validateDate($dato_reserva['fecha_inicio'])) throw new \Exception('fecha inicio inválida');
            if (!isset($dato_reserva['fecha_fin']) || !DateTimeUtil::validateDate($dato_reserva['fecha_fin']))  throw new \Exception('fecha fin inválida');

            $disponibilidad = $reservaManager->getDisponibilidad($dato_reserva['fecha_inicio'], $dato_reserva['fecha_fin']);

            $this->respond($disponibilidad);

        } catch (\Exception $e) {
            $this->respondWithErrors($e->getMessage);
        }

    }
}