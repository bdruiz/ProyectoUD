<?php

namespace Proyecto\DeportesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * InventarioDeportes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\DeportesBundle\Entity\InventarioDeportesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class InventarioDeportes
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=10)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=50)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @ORM\ManyToOne(targetEntity="ElementosDeportes", inversedBy="ideportes")
     * @ORM\JoinColumn(name="elemento_id", referencedColumnName="id")
     */
    private $elemendepor;

    /**
     * @ORM\OneToMany(targetEntity="PrestamoDeportes", mappedBy="ideportes")
     */
    private $pdepor;

    public function __construct(){
        $this->pdepor = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return InventarioDeportes
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
     * Set estado
     *
     * @param string $estado
     * @return InventarioDeportes
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

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return InventarioDeportes
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return InventarioDeportes
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set elemendepor
     *
     * @param \Proyecto\DeportesBundle\Entity\ElementosDeportes $elemendepor
     * @return InventarioDeportes
     */
    public function setElemendepor(\Proyecto\DeportesBundle\Entity\ElementosDeportes $elemendepor = null)
    {
        $this->elemendepor = $elemendepor;

        return $this;
    }

    /**
     * Get elemendepor
     *
     * @return \Proyecto\DeportesBundle\Entity\ElementosDeportes 
     */
    public function getElemendepor()
    {
        return $this->elemendepor;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setCrearFecha(){
        $this->fecha = new \DateTime();
    }


    /**
     * Add pdepor
     *
     * @param \Proyecto\DeportesBundle\Entity\PrestamoDeportes $pdepor
     * @return InventarioDeportes
     */
    public function addPdepor(\Proyecto\DeportesBundle\Entity\PrestamoDeportes $pdepor)
    {
        $this->pdepor[] = $pdepor;

        return $this;
    }

    /**
     * Remove pdepor
     *
     * @param \Proyecto\DeportesBundle\Entity\PrestamoDeportes $pdepor
     */
    public function removePdepor(\Proyecto\DeportesBundle\Entity\PrestamoDeportes $pdepor)
    {
        $this->pdepor->removeElement($pdepor);
    }

    /**
     * Get pdepor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPdepor()
    {
        return $this->pdepor;
    }
}
