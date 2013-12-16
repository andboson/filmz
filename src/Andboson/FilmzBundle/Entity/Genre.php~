<?php

namespace Andboson\FilmzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Genre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Andboson\FilmzBundle\Entity\GenreRepository")
 */
class Genre
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;


    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Film", mappedBy="genre")
     */
    protected $filmz;

    public function __construct()
    {
        $this->filmz = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Genre
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set filmz
     *
     * @param array $filmz
     * @return Genre
     */
    public function setFilmz($filmz)
    {
        $this->filmz = $filmz;
    
        return $this;
    }

    /**
     * Get filmz
     *
     * @return array 
     */
    public function getFilmz()
    {
        return $this->filmz;
    }

    /**
     * Add filmz
     *
     * @param \Andboson\FilmzBundle\Entity\Film $filmz
     * @return Genre
     */
    public function addFilmz(\Andboson\FilmzBundle\Entity\Film $filmz)
    {
        $this->filmz[] = $filmz;
    
        return $this;
    }

    /**
     * Remove filmz
     *
     * @param \Andboson\FilmzBundle\Entity\Film $filmz
     */
    public function removeFilmz(\Andboson\FilmzBundle\Entity\Film $filmz)
    {
        $this->filmz->removeElement($filmz);
    }


    public function __toString()
    {
        return $this->name;
    }
}