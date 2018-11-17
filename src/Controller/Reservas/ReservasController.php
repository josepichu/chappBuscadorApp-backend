<?php
namespace App\Controller\Reservas;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\ApiController;
use App\Manager\ReservaManager;

class ReservasController extends ApiController
{
    /**
     * @Route("/disponibilidad", name="reservas.disponibilidad")
     */
    public function disponibilidad(ReservaManager $reservaManager)
    {
      
        return new JsonResponse([
            [
                'title' => 'The Princess Bride',
                'count' => 0
            ]
        ]);
    }
}