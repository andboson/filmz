<?php

namespace Andboson\FilmzBundle\Controller;

use Andboson\FilmzBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Andboson\FilmzBundle\Entity\Category;
use Andboson\FilmzBundle\Entity\Film;

class DefaultController extends Controller
{
    public function indexAction($name)
    {

        $genre = new Genre();
        $genre->setName('comedy');

        $category = new Category();
        $category->setName('Multfilm');

        $film = new Film();
        $film->setName('Planes');
        $film->setRating(0);
        $film->setDirector('Lucas');
        $film->setLink('google');
        $film->setPoster('ggoo');
        $film->setDescription('very funny film');
        $film->setReleaseDate(new \DateTime('01.01.2014 10:10'));

        $film->setCategory($category);
        $film->addGenre($genre);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($film);
        $em->persist($genre);
        $em->flush();

        return $this->render('AndbosonFilmzBundle:Default:index.html.twig', array('name' => $name));
    }
}
