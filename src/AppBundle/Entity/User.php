<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
* @ORM\Entity
* @ORM\Table(name="user")
* @UniqueEntity(fields="email", message="Email already registered!")
* @UniqueEntity(fields="username", message="Username already registered!")
*/
class User implements UserInterface, \Serializable
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	public $id;

	/**
	* @ORM\Column(name="username", type="string", length=20, unique=true)
	* @Assert\NotBlank()
	*/
	public $username;

	/**
	* @ORM\Column(name="email", type="string", length=60, unique=true)
	* @Assert\NotBlank()
	* @Assert\Email()
	*/
	public $email;

	/**
     * @Assert\NotBlank()
     * @Assert\Length(max = 4096)
     */
	public $plainPassword;

	/**
	* @ORM\Column(name="password", type="string", length=64)
	*/
	public $password;

	/**
     * @ORM\Column(name="is_active", type="boolean")
     */
    public $isActive;

    public function getUsername()
    {
        return $this->username;
    }

	/**
	* @ORM\OneToMany(targetEntity="AppBundle\Entity\Doodle", mappedBy="user")
	*/
	public $doodles;

	/**
	* @ORM\OneToMany(targetEntity="AppBundle\Entity\Comment", mappedBy="user")
	*/
	public $comments;

	public function __construct()
	{
		$this->isActive = true;
		$this->doodles = new ArrayCollection();
		$this->comments = new ArrayCollection();
	}

	public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

	public function getRoles()
    {
        return array('ROLE_USER');
    }

	public function eraseCredentials()
    {
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }


    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
        ) = unserialize($serialized);
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
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
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
     * Add doodle
     *
     * @param \AppBundle\Entity\Doodle $doodle
     *
     * @return User
     */
    public function addDoodle(\AppBundle\Entity\Doodle $doodle)
    {
        $this->doodles[] = $doodle;
    
        return $this;
    }

    /**
     * Remove doodle
     *
     * @param \AppBundle\Entity\Doodle $doodle
     */
    public function removeDoodle(\AppBundle\Entity\Doodle $doodle)
    {
        $this->doodles->removeElement($doodle);
    }

    /**
     * Get doodles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDoodles()
    {
        return $this->doodles;
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;
    
        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\Comment $comment
     */
    public function removeComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
