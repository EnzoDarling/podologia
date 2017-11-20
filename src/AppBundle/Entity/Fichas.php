<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichas
 *
 * @ORM\Table(name="fichas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FichasRepository")
 */
class Fichas
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
     * @ORM\Column(name="ficha_apellido", type="string", length=255)
     */
    private $fichaApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_nombre", type="string", length=255)
     */
    private $fichaNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_edad", type="string", length=255)
     */
    private $fichaEdad;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_direccion", type="string", length=255)
     */
    private $fichaDireccion;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_hiperhidro", type="string", length=255)
     */
    private $fichaHiperhidro;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_micosis", type="string", length=255)
     */
    private $fichaMicosis;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_anticua", type="string", length=255)
     */
    private $fichaAnticua;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_dbt", type="string", length=255)
     */
    private $fichaDbt;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_onicocri", type="string", length=255)
     */
    private $fichaOnicocri;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_edema", type="string", length=255)
     */
    private $fichaEdema;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_talon", type="string", length=255)
     */
    private $fichaTalon;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_afecciones", type="string", length=255)
     */
    private $fichaAfecciones;

    /**
     * @var string
     *
     * @ORM\Column(name="ficha_hiperquera", type="string", length=255)
     */
    private $fichaHiperquera;


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
     * Set fichaApellido
     *
     * @param string $fichaApellido
     *
     * @return Fichas
     */
    public function setFichaApellido($fichaApellido)
    {
        $this->fichaApellido = $fichaApellido;

        return $this;
    }

    /**
     * Get fichaApellido
     *
     * @return string
     */
    public function getFichaApellido()
    {
        return $this->fichaApellido;
    }

    /**
     * Set fichaNombre
     *
     * @param string $fichaNombre
     *
     * @return Fichas
     */
    public function setFichaNombre($fichaNombre)
    {
        $this->fichaNombre = $fichaNombre;

        return $this;
    }

    /**
     * Get fichaNombre
     *
     * @return string
     */
    public function getFichaNombre()
    {
        return $this->fichaNombre;
    }

    /**
     * Set fichaEdad
     *
     * @param string $fichaEdad
     *
     * @return Fichas
     */
    public function setFichaEdad($fichaEdad)
    {
        $this->fichaEdad = $fichaEdad;

        return $this;
    }

    /**
     * Get fichaEdad
     *
     * @return string
     */
    public function getFichaEdad()
    {
        return $this->fichaEdad;
    }

    /**
     * Set fichaDireccion
     *
     * @param string $fichaDireccion
     *
     * @return Fichas
     */
    public function setFichaDireccion($fichaDireccion)
    {
        $this->fichaDireccion = $fichaDireccion;

        return $this;
    }

    /**
     * Get fichaDireccion
     *
     * @return string
     */
    public function getFichaDireccion()
    {
        return $this->fichaDireccion;
    }

    /**
     * Set fichaHiperhidro
     *
     * @param string $fichaHiperhidro
     *
     * @return Fichas
     */
    public function setFichaHiperhidro($fichaHiperhidro)
    {
        $this->fichaHiperhidro = $fichaHiperhidro;

        return $this;
    }

    /**
     * Get fichaHiperhidro
     *
     * @return string
     */
    public function getFichaHiperhidro()
    {
        return $this->fichaHiperhidro;
    }

    /**
     * Set fichaMicosis
     *
     * @param string $fichaMicosis
     *
     * @return Fichas
     */
    public function setFichaMicosis($fichaMicosis)
    {
        $this->fichaMicosis = $fichaMicosis;

        return $this;
    }

    /**
     * Get fichaMicosis
     *
     * @return string
     */
    public function getFichaMicosis()
    {
        return $this->fichaMicosis;
    }

    /**
     * Set fichaAnticua
     *
     * @param string $fichaAnticua
     *
     * @return Fichas
     */
    public function setFichaAnticua($fichaAnticua)
    {
        $this->fichaAnticua = $fichaAnticua;

        return $this;
    }

    /**
     * Get fichaAnticua
     *
     * @return string
     */
    public function getFichaAnticua()
    {
        return $this->fichaAnticua;
    }

    /**
     * Set fichaDbt
     *
     * @param string $fichaDbt
     *
     * @return Fichas
     */
    public function setFichaDbt($fichaDbt)
    {
        $this->fichaDbt = $fichaDbt;

        return $this;
    }

    /**
     * Get fichaDbt
     *
     * @return string
     */
    public function getFichaDbt()
    {
        return $this->fichaDbt;
    }

    /**
     * Set fichaOnicocri
     *
     * @param string $fichaOnicocri
     *
     * @return Fichas
     */
    public function setFichaOnicocri($fichaOnicocri)
    {
        $this->fichaOnicocri = $fichaOnicocri;

        return $this;
    }

    /**
     * Get fichaOnicocri
     *
     * @return string
     */
    public function getFichaOnicocri()
    {
        return $this->fichaOnicocri;
    }

    /**
     * Set fichaEdema
     *
     * @param string $fichaEdema
     *
     * @return Fichas
     */
    public function setFichaEdema($fichaEdema)
    {
        $this->fichaEdema = $fichaEdema;

        return $this;
    }

    /**
     * Get fichaEdema
     *
     * @return string
     */
    public function getFichaEdema()
    {
        return $this->fichaEdema;
    }

    /**
     * Set fichaTalon
     *
     * @param string $fichaTalon
     *
     * @return Fichas
     */
    public function setFichaTalon($fichaTalon)
    {
        $this->fichaTalon = $fichaTalon;

        return $this;
    }

    /**
     * Get fichaTalon
     *
     * @return string
     */
    public function getFichaTalon()
    {
        return $this->fichaTalon;
    }

    /**
     * Set fichaAfecciones
     *
     * @param string $fichaAfecciones
     *
     * @return Fichas
     */
    public function setFichaAfecciones($fichaAfecciones)
    {
        $this->fichaAfecciones = $fichaAfecciones;

        return $this;
    }

    /**
     * Get fichaAfecciones
     *
     * @return string
     */
    public function getFichaAfecciones()
    {
        return $this->fichaAfecciones;
    }

    /**
     * Set fichaHiperquera
     *
     * @param string $fichaHiperquera
     *
     * @return Fichas
     */
    public function setFichaHiperquera($fichaHiperquera)
    {
        $this->fichaHiperquera = $fichaHiperquera;

        return $this;
    }

    /**
     * Get fichaHiperquera
     *
     * @return string
     */
    public function getFichaHiperquera()
    {
        return $this->fichaHiperquera;
    }
}

