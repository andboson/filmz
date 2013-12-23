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




        // perhaps you only want to act on some "Product" entity
        if ($entity instanceof Comments) {

            $film = $entityManager->getRepository('AndbosonFilmzBundle:Film')->find( $entity->getFilm() );

            $query = $entityManager
                ->createQuery('
            SELECT c FROM AndbosonFilmzBundle:Comments c
            WHERE c.film = :film'
                )->setParameters(Array('film' => $entity->getFilm() ));

            $comments = $query->getArrayResult();

            $rating = $entity->getRate();
            $count = count( $comments ) + 1;
            foreach( $comments as $comment ){
                $rating += $comment['rate'];
            }

            $averageRating = $rating / $count;
            $film->setRating( $averageRating );
            $entityManager->persist($film);
            $entityManager->flush();

        }
    }
}
