<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends AbstractController
{

    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {

        try {

            $em = $this->getDoctrine()->getManager();

            $datos = json_decode($request->getContent(), true);

            if (!isset($datos['_username']) || trim( $datos['_username']) == '') throw new \Exception('username inválido');
            if (!isset($datos['_password']) || trim( $datos['_password']) == '') throw new \Exception('username inválido');
            
            $username = $datos['_username'];
            $password = $datos['_password'];
            
            $user = new User($username);
            $user->setPassword($encoder->encodePassword($user, $password));
            $em->persist($user);
            $em->flush();
    
            return new JsonResponse(array('success' => true));

        } catch (\Exception $e) {
            return new JsonResponse(array('success' => false, 'msg' => $e->getMessage()));
        }

    }

    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }
    
}