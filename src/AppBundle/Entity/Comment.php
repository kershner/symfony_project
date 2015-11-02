<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="comment")
*/
class Comment
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	public $id;

	/**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
	public $user;

	/**
     * @ORM\Column(name="author", type="string", length=100)
     */
    public $author = '';

	/**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Doodle")
     * @ORM\JoinColumn(name="doodle_id", referencedColumnName="id")
     */
	public $doodle;

	/**
     * @ORM\Column(name="created", type="date")
     */
	public $created;

	/**
	* @ORM\Column(name="text", type="string", length=140)
	*/
	public $text;
}