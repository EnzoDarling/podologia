<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vade
 *
 * @ORM\Table(name="vade")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VadeRepository")
 */
class Vade
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
     * @ORM\Column(name="vade_nombre", type="string", length=255)
     */
    private $vadeNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="vade_posologia", type="string", length=255)
     */
    private $vadePosologia;

    /**
     * @var string
     *
     * @ORM\Column(name="vade_indicacion", type="string", length=255)
     */
    private $vadeIndicacion;


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
     * Set vadeNombre
     *
     * @param string $vadeNombre
     *
     * @return Vade
     */
    public function setVadeNombre($vadeNombre)
    {
        $this->vadeNombre = $vadeNombre;

        return $this;
    }

    /**
     * Get vadeNombre
     *
     * @return string
     */
    public function getVadeNombre()
    {
        return $this->vadeNombre;
    }

    /**
     * Set vadePosologia
     *
     * @param string $vadePosologia
     *
     * @return Vade
     */
    public function setVadePosologia($vadePosologia)
    {
        $this->vadePosologia = $vadePosologia;

        return $this;
    }

    /**
     * Get vadePosologia
     *
     * @return string
     */
    public function getVadePosologia()
    {
        return $this->vadePosologia;
    }

    /**
     * Set vadeIndicacion
     *
     * @param string $vadeIndicacion
     *
     * @return Vade
     */
    public function setVadeIndicacion($vadeIndicacion)
    {
        $this->vadeIndicacion = $vadeIndicacion;

        return $this;
    }

    /**
     * Get vadeIndicacion
     *
     * @return string
     */
    public function getVadeIndicacion()
    {
        return $this->vadeIndicacion;
    }
}

