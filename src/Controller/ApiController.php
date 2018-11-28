<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Controlador básico para respuestas json al frontend
 */
class ApiController extends AbstractController
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
    public function respond($data, $serialize = false, $headers = [])
    {

        if ($serialize) {

            $encoders = array(new JsonEncoder());
            $normalizer = new ObjectNormalizer();
            $normalizer->setCircularReferenceLimit(2); 
            $normalizer->setCircularReferenceHandler(function ($object) { return $object->getId(); });
            $normalizers = array($normalizer);
            $serializer = new Serializer($normalizers, $encoders);
            
            $data = $serializer->serialize($data, 'json');
        }

        $data = [
            'data' => $data,
            'total' => is_array($data) ? count($data) : 1, // para paginaciones en front
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