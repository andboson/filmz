<?php

namespace Andboson\FilmzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comments
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Andboson\FilmzBundle\Entity\CommentsRepository")
 */
class Comments
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
     * @ORM\Column(name="authorName", type="string", length=255)
     */
    private $authorName;

    /**
     * @var string
     *
     * @ORM\Column(name="authorEmail", type="string", length=255)
     */
    private $authorEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="authorIp", type="string", length=255)
     */
    private $authorIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAdded", type="datetime")
     */
    private $dateAdded;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hidden", type="boolean")
     */
    private $hidden = false;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate", type="integer")
     */
    private $rate = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Film", inversedBy="comments")
     * @ORM\JoinColumn(name="film_id", referencedColumnName="id", onDelete="CASCADE")
     *
     */
    private $film;

    function __construct()
    {
        $request = Request::createFromGlobals();;
        $this->dateAdded = new \DateTime();
        $this->authorIp = $request->getClientIp();
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
     * Set authorName
     *
     * @param string $authorName
     * @return Comments
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    
        return $this;
    }

    /**
     * Get authorName
     *
     * @return string 
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * Set authorEmail
     *
     * @param string $authorEmail
     * @return Comments
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    
        return $this;
    }

    /**
     * Get authorEmail
     *
     * @return string 
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * Set authorIp
     *
     * @param string $authorIp
     * @return Comments
     */
    public function setAuthorIp($authorIp)
    {
        $this->authorIp = $authorIp;
    
        return $this;
    }

    /**
     * Get authorIp
     *
     * @return string 
     */
    public function getAuthorIp()
    {
        return $this->authorIp;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return Comments
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    
        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set hidden
     *
     * @param boolean $hidden
     * @return Comments
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    
        return $this;
    }

    /**
     * Get hidden
     *
     * @return boolean 
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Comments
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set rate
     *
     * @param integer $rate
     * @return Comments
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    
        return $this;
    }

    /**
     * Get rate
     *
     * @return integer 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set film
     *
     * @param integer $film
     * @return Comments
     */
    public function setFilm($film)
    {
        $this->film = $film;
    
        return $this;
    }

    /**
     * Get film
     *
     * @return integer 
     */
    public function getFilm()
    {
        return $this->film;
    }


}