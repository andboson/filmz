<?php

namespace Andboson\FilmzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Andboson\FilmzBundle\Entity\CategoryRepository")
 */
class Category
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
     * @ORM\OneToMany(targetEntity="Film", mappedBy="category")
     */
    protected $filmz;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

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
     * @return Category
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
     * @return Category
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
     * @return Category
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

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}