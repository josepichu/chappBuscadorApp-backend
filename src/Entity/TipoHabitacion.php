<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="habitaciones_tipo")
 * @ORM\Entity
 */
class TipoHabitacion
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * 
     * referencia a hotel por el requisito de ser configurable a nivel de hotel desde la interfaz (no creo q me de tiempo a implementarlo en interfaz :())
     * 
     * @ORM\Column(type="string", length=128)
     */
    //private $hotel;

    /**
     * @ORM\Column(type="integer", length=2)
     */
    private $capacidad;

    /**
     * @ORM\Column(type="integer", length=2)
     */
    private $numero_camas_individuales;

    /**
     * @ORM\Column(type="integer", length=2)
     */
    private $numero_camas_dobles;    
     
    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ducha;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wifi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $television;

     /**
     * @ORM\Column(type="boolean")
     */
    private $aire_acondicionado; 
    

}