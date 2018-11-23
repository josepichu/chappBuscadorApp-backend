<?php
// src/EventListener/ExceptionListener.php
namespace App\Listeners;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use App\EventSubscriber\TenantSubscriber;
use App\Utils\IPHelper;


class JWTListener
{    
    private $request;
    private $jwt;    

    public function __construct(RequestStack $request, JWTEncoderInterface $jwt){            
        $this->request = $request->getCurrentRequest();  
        $this->jwt = $jwt;   
    }
    
    public function onJWTCreated(JWTCreatedEvent $event){        
        $payload = $event->getData();
        $payload['user_info'] = $event->getUser()->getDetails();      
        $event->setData($payload);
                
    }

}
