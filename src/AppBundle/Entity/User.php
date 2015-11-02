<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="user")
*/
class User
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	public $id;

	/**
	* @ORM\Column(name="name", type="string", length=20)
	*/
	public $name;

	/**
	* @ORM\Column(name="email", type="string", length=150)
	*/
	public $email;

	/**
	* @ORM\Column(name="password", type="string", length=50)
	*/
	public $password;

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
		$this->doodles = new ArrayCollection();
		$this->comments = new ArrayCollection();
	}
}