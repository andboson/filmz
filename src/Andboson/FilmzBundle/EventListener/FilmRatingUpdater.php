<?php

namespace Andboson\FilmzBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Andboson\FilmzBundle\Entity\Comments;
use Andboson\FilmzBundle\Entity\Film;

class FilmRatingUpdater
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if ($entity instanceof Comments) {

            $film = $entityManager->getRepository('AndbosonFilmzBundle:Film')->find( $entity->getFilm() );
            $comments =  $entityManager->getRepository('AndbosonFilmzBundle:Comments')->findBy(Array('film' => $entity->getFilm() ) );
            $rating = $entity->getRate();
            $count = count( $comments ) + 1;
            foreach( $comments as $comment ){
                $rating += $comment->getRate();
            }

            $averageRating = $rating / $count;
            $film->setRating( $averageRating );
            $entityManager->persist($film);
            $entityManager->flush($film);

        }
    }
}
