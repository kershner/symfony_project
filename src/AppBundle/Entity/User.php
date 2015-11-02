<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
}