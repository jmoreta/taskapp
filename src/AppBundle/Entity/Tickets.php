<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tickets
 *
 * @ORM\Table(name="tickets")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TicketsRepository")
 */
class Tickets
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creado", type="date")
     */
    private $fechaCreado;

    /**
     * @var int
     *
     * @ORM\Column(name="usuario_id", type="integer")
     */
    private $usuarioId;

    /**
     * @var int
     *
     * @ORM\Column(name="usuario_asignado_id", type="integer")
     */
    private $usuarioAsignadoId;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=50)
     */
    private $estado;





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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Tickets
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Tickets
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaCreado
     *
     * @param \DateTime $fechaCreado
     *
     * @return Tickets
     */
    public function setFechaCreado($fechaCreado)
    {
        $this->fechaCreado = $fechaCreado;

        return $this;
    }

    /**
     * Get fechaCreado
     *
     * @return \DateTime
     */
    public function getFechaCreado()
    {
        return $this->fechaCreado;
    }

    /**
     * Set usuarioId
     *
     * @param integer $usuarioId
     *
     * @return Tickets
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return int
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set usuarioAsignadoId
     *
     * @param integer $usuarioAsignadoId
     *
     * @return Tickets
     */
    public function setUsuarioAsignadoId($usuarioAsignadoId)
    {
        $this->usuarioAsignadoId = $usuarioAsignadoId;

        return $this;
    }

    /**
     * Get usuarioAsignadoId
     *
     * @return int
     */
    public function getUsuarioAsignadoId()
    {
        return $this->usuarioAsignadoId;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Tickets
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }
}

