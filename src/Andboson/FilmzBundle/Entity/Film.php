<?php

namespace Andboson\FilmzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Film
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Andboson\FilmzBundle\Entity\FilmRepository")
 */
class Film
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="filmz")
     * @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", length=255)
     */
    private $director;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="filmz")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="poster", type="string", length=255)
     */
    private $poster;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="film")
     */
    private $comments;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="release_date", type="datetime")
     */
    private $releaseDate;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=512)
     */
    private $link;

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
     * @return Film
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
     * Set director
     *
     * @param string $director
     * @return Film
     */
    public function setDirector($director)
    {
        $this->director = $director;
    
        return $this;
    }

    /**
     * Get director
     *
     * @return string 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Film
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set poster
     *
     * @param string $poster
     * @return Film
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;
    
        return $this;
    }

    /**
     * Get poster
     *
     * @return string 
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Film
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    
        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set comments
     *
     * @param integer $comments
     * @return Film
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    
        return $this;
    }

    /**
     * Get comments
     *
     * @return integer 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     * @return Film
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    
        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime 
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Film
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->genre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add genre
     *
     * @param \Andboson\FilmzBundle\Entity\Genre $genre
     * @return Film
     */
    public function addGenre(\Andboson\FilmzBundle\Entity\Genre $genre)
    {
        $this->genre[] = $genre;
    
        return $this;
    }

    /**
     * Remove genre
     *
     * @param \Andboson\FilmzBundle\Entity\Genre $genre
     */
    public function removeGenre(\Andboson\FilmzBundle\Entity\Genre $genre)
    {
        $this->genre->removeElement($genre);
    }

    /**
     * Add comments
     *
     * @param \Andboson\FilmzBundle\Entity\Comments $comments
     * @return Film
     */
    public function addComment(\Andboson\FilmzBundle\Entity\Comments $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Andboson\FilmzBundle\Entity\Comments $comments
     */
    public function removeComment(\Andboson\FilmzBundle\Entity\Comments $comments)
    {
        $this->comments->removeElement($comments);
    }


    /**
     * Get genre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenre()
    {

        return $this->genre;
    }
    /**
     * Get genre
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGenreString()
    {
        $genreList = '';

        foreach( $this->genre as $genre ){
            $genreList .= $genre->getName();
        }
        return $genreList;
    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name;
    }



}