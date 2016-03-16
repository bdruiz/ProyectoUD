<?php

namespace Proyecto\EnfermeriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Proyecto\EnfermeriaBundle\Entity\ReporteEmergencia;

/**
 * SeguridadSocial
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\EnfermeriaBundle\Entity\SeguridadSocialRepository")
 */
class SeguridadSocial
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=15)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="eps", type="string", length=100)
     */
    private $eps;

    /**
     * @var string
     *
     * @ORM\Column(name="rh", type="string", length=10)
     */
    private $rh;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_contacto", type="string", length=15)
     */
    private $telefonoContacto;


    /**
     *
     * @ORM\ManyToOne(targetEntity="\Proyecto\AdminBundle\Entity\Usuarios", inversedBy="ssocial")
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
     * Set eps
     *
     * @param string $eps
     * @return SeguridadSocial
     */
    public function setEps($eps)
    {
        $this->eps = $eps;

        return $this;
    }

    /**
     * Get eps
     *
     * @return string 
     */
    public function getEps()
    {
        return $this->eps;
    }

    /**
     * Set rh
     *
     * @param string $rh
     * @return SeguridadSocial
     */
    public function setRh($rh)
    {
        $this->rh = $rh;

        return $this;
    }

    /**
     * Get rh
     *
     * @return string 
     */
    public function getRh()
    {
        return $this->rh;
    }

    /**
     * Set telefonoContacto
     *
     * @param string $telefonoContacto
     * @return SeguridadSocial
     */
    public function setTelefonoContacto($telefonoContacto)
    {
        $this->telefonoContacto = $telefonoContacto;

        return $this;
    }

    /**
     * Get telefonoContacto
     *
     * @return string 
     */
    public function getTelefonoContacto()
    {
        return $this->telefonoContacto;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return SeguridadSocial
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }



    /**
     * Set users
     *
     * @param \Proyecto\AdminBundle\Entity\Usuarios $users
     * @return SeguridadSocial
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
