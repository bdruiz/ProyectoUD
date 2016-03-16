<?php

namespace Proyecto\DeportesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ElementosDeportes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\DeportesBundle\Entity\ElementosDeportesRepository")
 */
class ElementosDeportes
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="InventarioDeportes", mappedBy="elemendepor"))
     *
     */

    private $ideportes;

    public function _construct(){
        $this->ideportes = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return ElementosDeportes
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ElementosDeportes
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
     * Set id
     *
     * @param string $id
     * @return ElementosDeportes
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ideportes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ideportes
     *
     * @param \Proyecto\DeportesBundle\Entity\InventarioDeportes $ideportes
     * @return ElementosDeportes
     */
    public function addIdeporte(\Proyecto\DeportesBundle\Entity\InventarioDeportes $ideportes)
    {
        $this->ideportes[] = $ideportes;

        return $this;
    }

    /**
     * Remove ideportes
     *
     * @param \Proyecto\DeportesBundle\Entity\InventarioDeportes $ideportes
     */
    public function removeIdeporte(\Proyecto\DeportesBundle\Entity\InventarioDeportes $ideportes)
    {
        $this->ideportes->removeElement($ideportes);
    }

    /**
     * Get ideportes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdeportes()
    {
        return $this->ideportes;
    }

    public function _toString(){
        return $this->getNombre();
    }
}
