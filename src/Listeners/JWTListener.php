<?php
// src/EventListener/ExceptionListener.php
namespace App\Listeners;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;


class JWTListener
{    
    private $request;
    private $jwt;    

    public function __construct(RequestStack $request, JWTEncoderInterface $jwt){            
        $this->request = $request->getCurrentRequest();  
        $this->jwt = $jwt;   
    }
    
    // detalles de usuario en el token
    public function onJWTCreated(JWTCreatedEvent $event){        
        $payload = $event->getData();
        $payload['user_info'] = $event->getUser()->getDetails();      
        $event->setData($payload);
                
    }

    // enviamos el nombre de usuario junto al token
   public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event) {
    $event->setData([
        'username' => $event->getUser()->getUserName(),
        'payload' => $event->getData(),
    ]);
   }

}
