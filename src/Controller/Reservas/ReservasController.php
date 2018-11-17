<?php
namespace App\Controller\Reservas;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ReservasController
{
    /**
     * @Route("/disponibilidad", name="reservas.disponibilidad")
     */
    public function disponibilidad()
    {
      
        return new JsonResponse([
            [
                'title' => 'The Princess Bride',
                'count' => 0
            ]
        ]);
    }
}