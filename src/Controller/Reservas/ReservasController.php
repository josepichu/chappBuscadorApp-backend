<?php
namespace App\Controller\Reservas;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ReservasController
{
    /**
     * @Route("/reservas", name="app_lucky_number")
     */
    public function number()
    {
      
        return new JsonResponse([
            [
                'title' => 'The Princess Bride',
                'count' => 0
            ]
        ]);
    }
}