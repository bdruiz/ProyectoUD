<?php

namespace Proyecto\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Dependencia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\AdminBundle\Entity\DependenciaRepository")
 */
class Dependencia
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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\ManyToMany(targetEntity="Usuarios", mappedBy="dependencia")
     */
    private $users;

    public function __construct(){
        $this->users = new ArrayCollection();
    }

    public function __toString(){
        return $this->getNombre();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Dependencia
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
     * Set id
     *
     * @param string $id
     * @return Dependencia
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Add users
     *
     * @param \Proyecto\AdminBundle\Entity\Usuarios $users
     * @return Dependencia
     */
    public function addUser(\Proyecto\AdminBundle\Entity\Usuarios $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Proyecto\AdminBundle\Entity\Usuarios $users
     */
    public function removeUser(\Proyecto\AdminBundle\Entity\Usuarios $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
