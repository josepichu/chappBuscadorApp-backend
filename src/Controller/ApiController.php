<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controlador básico para respuestas json al frontend
 */
class ApiController
{

    protected $msg_ok = 'Acción generada correctamente';

    protected $statusCode = 200;

 
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Returns a JSON response
     *
     * @param array $data
     * @param array $headers
     *
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function respond($data, $headers = [])
    {

        $data = [
            'data' => $data,
            'total' => count($data), // para paginaciones en front
            'success' => true,
            'mensaje' => [
                'version' => getenv('VERSION_APP'), // para evitar cacheos del navegador
                'msg' => $this->msg_ok
            ]
        ];

        return new JsonResponse($data, $this->getStatusCode(), $headers);
    }

    /**
     * Sets an error message and returns a JSON response
     *
     * @param string $errors
     *
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function respondWithErrors($errors, $headers = [])
    {
        $data = [
            'data' => null,
            'success' => false,
            'mensaje' => [
                'version' => getenv('VERSION_APP'),
                'msg' => $errors
            ]
        ];

        return new JsonResponse($data, $this->getStatusCode(), $headers);
    }


}