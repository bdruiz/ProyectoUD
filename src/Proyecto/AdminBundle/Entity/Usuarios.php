<?php

namespace Proyecto\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Proyecto\AdminBundle\Entity\Dependencia;
use Proyecto\AdminBundle\Entity\Roles;


/**
 * Usuarios
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Proyecto\AdminBundle\Entity\UsuariosRepository")
 */
class Usuarios implements AdvancedUserInterface, \Serializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=20)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="idCarnet", type="string", length=255)
     */
    private $idCarnet;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=100)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=100)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=70)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=50)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="blob")
     */
    private $foto;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\ManyToMany(targetEntity="Roles", inversedBy="users")
     *
     */
    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity="Dependencia", inversedBy="users")
     */
    private $dependencia;

    /**
     * @ORM\OneToMany(targetEntity="Proyecto\EnfermeriaBundle\Entity\SeguridadSocial", mappedBy="users")
     */
    private $ssocial;

    /**
     *
     * @ORM\OneToMany(targetEntity="Proyecto\EnfermeriaBundle\Entity\ReporteEmergencia", mappedBy="users")
     *
     */
    private $remer;

    /**
     * @ORM\OneToOne(targetEntity="Proyecto\DeportesBundle\Entity\PrestamoDeportes", mappedBy="users")
     */
    private $pdepor;

    public function __construct(){
        $this->roles = new ArrayCollection();
        $this->dependencia = new ArrayCollection();
        $this->ssocial = new ArrayCollection();
        $this->remer = new ArrayCollection();
    }

    public function __toString(){
        return $this->getUsername();
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
     * Set username
     *
     * @param string $username
     * @return Usuarios
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set idCarnet
     *
     * @param string $idCarnet
     * @return Usuarios
     */
    public function setIdCarnet($idCarnet)
    {
        $this->idCarnet = $idCarnet;

        return $this;
    }

    /**
     * Get idCarnet
     *
     * @return string 
     */
    public function getIdCarnet()
    {
        return $this->idCarnet;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Usuarios
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuarios
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuarios
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuarios
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuarios
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Usuarios
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
     * Set foto
     *
     * @param string $foto
     * @return Usuarios
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Usuarios
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Usuarios
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Add roles
     *
     * @param \Proyecto\AdminBundle\Entity\Roles $roles
     * @return Usuarios
     */
    public function addRole(Roles $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Proyecto\AdminBundle\Entity\Roles $roles
     */
    public function removeRole(Roles $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Add dependencia
     *
     * @param \Proyecto\AdminBundle\Entity\Dependencia $dependencia
     * @return Usuarios
     */
    public function addDependencium(Dependencia $dependencia)
    {
        $this->dependencia[] = $dependencia;

        return $this;
    }

    /**
     * Remove dependencia
     *
     * @param \Proyecto\AdminBundle\Entity\Dependencia $dependencia
     */
    public function removeDependencium(Dependencia $dependencia)
    {
        $this->dependencia->removeElement($dependencia);
    }

    /**
     * Get dependencia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDependencia()
    {
        return $this->dependencia;
    }

    public function eraseCredentials(){
    }

    public function isAccountNonExpired(){
        return true;
    }

    public function isAccountNonLocked(){
        return true;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled() {
        return true;
    }

    public function serialize() {
        return serialize(array(
            $this->id,
        ));
    }

    public function unserialize($serialized) {
        list(
            $this->id,
            )= unserialize($serialized);
    }



    /**
     * Add ssocial
     *
     * @param \Proyecto\EnfermeriaBundle\Entity\SeguridadSocial $ssocial
     * @return Usuarios
     */
    public function addSsocial(\Proyecto\EnfermeriaBundle\Entity\SeguridadSocial $ssocial)
    {
        $this->ssocial[] = $ssocial;

        return $this;
    }

    /**
     * Remove ssocial
     *
     * @param \Proyecto\EnfermeriaBundle\Entity\SeguridadSocial $ssocial
     */
    public function removeSsocial(\Proyecto\EnfermeriaBundle\Entity\SeguridadSocial $ssocial)
    {
        $this->ssocial->removeElement($ssocial);
    }

    /**
     * Get ssocial
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSsocial()
    {
        return $this->ssocial;
    }

    /**
     * Add remer
     *
     * @param \Proyecto\EnfermeriaBundle\Entity\ReporteEmergencia $remer
     * @return Usuarios
     */
    public function addRemer(\Proyecto\EnfermeriaBundle\Entity\ReporteEmergencia $remer)
    {
        $this->remer[] = $remer;

        return $this;
    }

    /**
     * Remove remer
     *
     * @param \Proyecto\EnfermeriaBundle\Entity\ReporteEmergencia $remer
     */
    public function removeRemer(\Proyecto\EnfermeriaBundle\Entity\ReporteEmergencia $remer)
    {
        $this->remer->removeElement($remer);
    }

    /**
     * Get remer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRemer()
    {
        return $this->remer;
    }

    /**
     * Set pdepor
     *
     * @param \Proyecto\DeportesBundle\Entity\PrestamoDeportes $pdepor
     * @return Usuarios
     */
    public function setPdepor(\Proyecto\DeportesBundle\Entity\PrestamoDeportes $pdepor = null)
    {
        $this->pdepor = $pdepor;

        return $this;
    }

    /**
     * Get pdepor
     *
     * @return \Proyecto\DeportesBundle\Entity\PrestamoDeportes 
     */
    public function getPdepor()
    {
        return $this->pdepor;
    }
}
