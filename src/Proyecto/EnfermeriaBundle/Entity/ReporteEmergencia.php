<?php

namespace Proyecto\EnfermeriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReporteEmergencia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\EnfermeriaBundle\Entity\ReporteEmergenciaRepository")
 */
class ReporteEmergencia
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
     * @var string
     *
     * @ORM\Column(name="detalle", type="text")
     */
    private $detalle;

    /**
     *
     * @ORM\ManyToOne(targetEntity="\Proyecto\AdminBundle\Entity\Usuarios", inversedBy="remer")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $users;

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
     * Set detalle
     *
     * @param string $detalle
     * @return ReporteEmergencia
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }




    /**
     * Set users
     *
     * @param \Proyecto\AdminBundle\Entity\Usuarios $users
     * @return ReporteEmergencia
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
}
