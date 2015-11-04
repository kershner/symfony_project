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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
	public $user;

	/**
     * @ORM\Column(name="author", type="string", length=100)
     */
    public $author;

	/**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Doodle", inversedBy="comments")
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
     * Set author
     *
     * @param string $author
     *
     * @return Comment
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Comment
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Comment
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set doodle
     *
     * @param \AppBundle\Entity\Doodle $doodle
     *
     * @return Comment
     */
    public function setDoodle(\AppBundle\Entity\Doodle $doodle = null)
    {
        $this->doodle = $doodle;

        return $this;
    }

    /**
     * Get doodle
     *
     * @return \AppBundle\Entity\Doodle
     */
    public function getDoodle()
    {
        return $this->doodle;
    }
}
