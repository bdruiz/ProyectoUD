<?php

namespace Proyecto\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Roles
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\AdminBundle\Entity\RolesRepository")
 */
class Roles implements RoleInterface
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
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=20)
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity="Usuarios", mappedBy="roles")
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
     * @return Roles
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
     * Set role
     *
     * @param string $role
     * @return Roles
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Roles
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
     * @return Roles
     */
    public function addUser(Usuarios $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Proyecto\AdminBundle\Entity\Usuarios $users
     */
    public function removeUser(Usuarios $users)
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
