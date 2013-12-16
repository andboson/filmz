<?php

namespace Andboson\FilmzBundle\Controller;

use Andboson\FilmzBundle\Entity\Comments;
use Andboson\FilmzBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Andboson\FilmzBundle\Entity\Category;
use Andboson\FilmzBundle\Entity\Film;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    public function indexAction()
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


        $comment = new Comments();
        $comment->setMessage('comment');
        $comment->setAuthorEmail('test@tes.com');
        $comment->setAuthorIp('127.0.0.1');
        $comment->setDateAdded(new \DateTime('now'));
        $comment->setAuthorName('Vasya');
       $comment->setFilm( $film );

        $film->addComment($comment);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($film);
        $em->persist($genre);
        $em->persist($comment);
        $em->flush();

        return $this->render('AndbosonFilmzBundle:Default:index.html.twig', array('name' => $name));
    }
}
