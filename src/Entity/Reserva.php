<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="reservas")
 * @ORM\Entity(repositoryClass="App\Repository\ReservasRepository")
 */
class Reserva
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=48, unique=true)
     */
    private $localizador;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reservas")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="Habitacion", inversedBy="reservas")
     * @ORM\JoinColumn(name="habitacion_id", referencedColumnName="id")
     */
    private $habitacion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_entrada;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_salida;    

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $check_in;   

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $check_out;   

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_check_in;   

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_check_out;      

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_telefono_contacto;     
    
    /**
     * @ORM\Column(type="string", length=24)
     */
    private $numero_tarjeta_credito;     
    
     /**
     * @ORM\Column(type="string", length=64)
     */
    private $email;   

     /**
     * @ORM\Column(type="float")
     */
    private $descuento;      

     /**
     * @ORM\Column(type="float")
     */
    private $impuestos;      

     /**
     * @ORM\Column(type="float")
     */
    private $total;

     /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cancelada; 
    
     /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_cancelacion;    

    public function __construct() {
        $this->localizador = uniqid();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocalizador(): ?string
    {
        return $this->localizador;
    }

    public function setLocalizador(string $localizador): self
    {
        $this->localizador = $localizador;

        return $this;
    }

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getHabitacion(): ?Habitacion
    {
        return $this->habitacion;
    }

    public function setHabitacion(?Habitacion $habitacion): self
    {
        $this->habitacion = $habitacion;

        return $this;
    }    

    public function getFechaEntrada(): ?\DateTimeInterface
    {
        return $this->fecha_entrada;
    }

    public function setFechaEntrada(\DateTimeInterface $fecha_entrada): self
    {
        $this->fecha_entrada = $fecha_entrada;

        return $this;
    }

    public function getFechaSalida(): ?\DateTimeInterface
    {
        return $this->fecha_salida;
    }

    public function setFechaSalida(\DateTimeInterface $fecha_salida): self
    {
        $this->fecha_salida = $fecha_salida;

        return $this;
    }

    public function getCheckIn(): ?bool
    {
        return $this->check_in;
    }

    public function setCheckIn(bool $check_in): self
    {
        $this->check_in = $check_in;

        return $this;
    }

    public function getCheckOut(): ?bool
    {
        return $this->check_out;
    }

    public function setCheckOut(bool $check_out): self
    {
        $this->check_out = $check_out;

        return $this;
    }

    public function getFechaCheckIn(): ?\DateTimeInterface
    {
        return $this->fecha_check_in;
    }

    public function setFechaCheckIn(\DateTimeInterface $fecha_check_in): self
    {
        $this->fecha_check_in = $fecha_check_in;

        return $this;
    }

    public function getFechaCheckOut(): ?\DateTimeInterface
    {
        return $this->fecha_check_out;
    }

    public function setFechaCheckOut(\DateTimeInterface $fecha_check_out): self
    {
        $this->fecha_check_out = $fecha_check_out;

        return $this;
    }

    public function getNumeroTelefonoContacto(): ?int
    {
        return $this->numero_telefono_contacto;
    }

    public function setNumeroTelefonoContacto(int $numero_telefono_contacto): self
    {
        $this->numero_telefono_contacto = $numero_telefono_contacto;

        return $this;
    }

    public function getNumeroTarjetaCredito(): ?string
    {
        return $this->numero_tarjeta_credito;
    }

    public function setNumeroTarjetaCredito(string $numero_tarjeta_credito): self
    {
        $this->numero_tarjeta_credito = $numero_tarjeta_credito;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDescuento(): ?float
    {
        return $this->descuento;
    }

    public function setDescuento(float $descuento): self
    {
        $this->descuento = $descuento;

        return $this;
    }

    public function getImpuestos(): ?float
    {
        return $this->impuestos;
    }

    public function setImpuestos(float $impuestos): self
    {
        $this->impuestos = $impuestos;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getCancelada(): ?bool
    {
        return $this->cancelada;
    }

    public function setCancelada(bool $cancelada): self
    {
        $this->cancelada = $cancelada;

        return $this;
    }

    public function getFechaCancelacion(): ?\DateTimeInterface
    {
        return $this->fecha_cancelacion;
    }

    public function setFechaCancelacion(\DateTimeInterface $fecha_cancelacion): self
    {
        $this->fecha_cancelacion = $fecha_cancelacion;

        return $this;
    }

}