<?php

namespace Proyecto\DeportesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrestamoDeportes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\DeportesBundle\Entity\PrestamoDeportesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class PrestamoDeportes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_entrega", type="datetime")
     */
    private $fechaEntrega;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_devolucion", type="datetime")
     */
    private $fechaDevolucion;

    /**
     * @ORM\OneToOne(targetEntity="Proyecto\AdminBundle\Entity\Usuarios", inversedBy="pdepor")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="InventarioDeportes", inversedBy="pdepor")
     * @ORM\JoinColumn(name="inventario_id", referencedColumnName="id")
     */
    private $ideportes;

    public function __toString(){
        return (string)$this->getId();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fechaEntrega
     *
     * @param \DateTime $fechaEntrega
     * @return PrestamoDeportes
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }

    /**
     * Get fechaEntrega
     *
     * @return \DateTime 
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * Set fechaDevolucion
     *
     * @param \DateTime $fechaDevolucion
     * @return PrestamoDeportes
     */
    public function setFechaDevolucion($fechaDevolucion)
    {
        $this->fechaDevolucion = $fechaDevolucion;

        return $this;
    }

    /**
     * Get fechaDevolucion
     *
     * @return \DateTime 
     */
    public function getFechaDevolucion()
    {
        return $this->fechaDevolucion;
    }


    /**
     * Set users
     *
     * @param \Proyecto\AdminBundle\Entity\Usuarios $users
     * @return PrestamoDeportes
     */
    public function setUsers(\Proyecto\AdminBundle\Entity\Usuarios $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \Proyecto\AdminBundle\Entity\Usuarios 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set ideportes
     *
     * @param \Proyecto\DeportesBundle\Entity\InventarioDeportes $ideportes
     * @return PrestamoDeportes
     */
    public function setIdeportes(\Proyecto\DeportesBundle\Entity\InventarioDeportes $ideportes = null)
    {
        $this->ideportes = $ideportes;

        return $this;
    }

    /**
     * Get ideportes
     *
     * @return \Proyecto\DeportesBundle\Entity\InventarioDeportes 
     */
    public function getIdeportes()
    {
        return $this->ideportes;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCrearFecha(){
        $this->fechaEntrega = new \DateTime();
        $this->fechaDevolucion = new \DateTime('+2 hour');
    }

    /**
     * @ORM\PrePersist
     */
    public function restarCantidad(){
        $inventario  = $this->getIdeportes();
        $inventario->setCantidad($inventario->getCantidad() - 1);
    }

    /*
     * @ORM\PreRemove
     */
    public function sumarCantidad(){
        $inventario  = $this->getIdeportes();
        $inventario->setCantidad($inventario->getCantidad() + 1);
    }
}
