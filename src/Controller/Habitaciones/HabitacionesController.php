<?php
namespace App\Controller\Habitaciones;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\ApiController;
use App\Manager\ReservaManager;
use Symfony\Component\HttpFoundation\Request;
use App\Utils\DateTimeUtil;
use App\Entity\Habitacion;

class HabitacionesController extends ApiController
{
    /**
     * @Route("/habitacion/{id}", methods={"GET"}, name="habitaciones.get")
     */
    public function disponibilidad($id, Request $request)
    {
      
        try {

            $em = $this->getDoctrine()->getManager();

            $hab = $em->getRepository(Habitacion::class)->getHabitacionInfo($id);

            return $this->respond($hab);

        } catch (\Exception $e) {
            return $this->respondWithErrors($e->getMessage());
        }

    }
}