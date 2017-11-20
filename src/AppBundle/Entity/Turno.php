<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Turno
 *
 * @ORM\Table(name="turno")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TurnoRepository")
 */
class Turno
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="turn_telefono", type="string", length=255, unique=true)
     */
    private $turnTelefono;

    /**
     * @var string
     *
     * @ORM\Column(name="turn_apellido", type="string", length=255)
     */
    private $turnApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="turn_nombre", type="string", length=255)
     */
    private $turnNombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="turn_fecha", type="datetimetz")
     */
    private $turnFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="turn_direccion", type="string", length=255)
     */
    private $turnDireccion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set turnTelefono
     *
     * @param string $turnTelefono
     *
     * @return Turno
     */
    public function setTurnTelefono($turnTelefono)
    {
        $this->turnTelefono = $turnTelefono;

        return $this;
    }

    /**
     * Get turnTelefono
     *
     * @return string
     */
    public function getTurnTelefono()
    {
        return $this->turnTelefono;
    }

    /**
     * Set turnApellido
     *
     * @param string $turnApellido
     *
     * @return Turno
     */
    public function setTurnApellido($turnApellido)
    {
        $this->turnApellido = $turnApellido;

        return $this;
    }

    /**
     * Get turnApellido
     *
     * @return string
     */
    public function getTurnApellido()
    {
        return $this->turnApellido;
    }

    /**
     * Set turnNombre
     *
     * @param string $turnNombre
     *
     * @return Turno
     */
    public function setTurnNombre($turnNombre)
    {
        $this->turnNombre = $turnNombre;

        return $this;
    }

    /**
     * Get turnNombre
     *
     * @return string
     */
    public function getTurnNombre()
    {
        return $this->turnNombre;
    }

    /**
     * Set turnFecha
     *
     * @param \DateTime $turnFecha
     *
     * @return Turno
     */
    public function setTurnFecha($turnFecha)
    {
        $this->turnFecha = $turnFecha;

        return $this;
    }

    /**
     * Get turnFecha
     *
     * @return \DateTime
     */
    public function getTurnFecha()
    {
        return $this->turnFecha;
    }

    /**
     * Set turnDireccion
     *
     * @param string $turnDireccion
     *
     * @return Turno
     */
    public function setTurnDireccion($turnDireccion)
    {
        $this->turnDireccion = $turnDireccion;

        return $this;
    }

    /**
     * Get turnDireccion
     *
     * @return string
     */
    public function getTurnDireccion()
    {
        return $this->turnDireccion;
    }
}

