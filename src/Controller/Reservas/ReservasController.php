<?php
namespace App\Controller\Reservas;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ReservasController
{
    /**
     * @Route("/reservas", name="reservas.list")
     */
    public function getReservas()
    {
      
        return new JsonResponse([
            [
                'title' => 'The Princess Bride',
                'count' => 0
            ]
        ]);
    }
}