<?php

namespace Andboson\FilmzBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CommentsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentsRepository extends EntityRepository
{
    public function findFilmId($id)
    {

        $query = $this->getEntityManager()
            ->createQuery('
            SELECT c FROM AndbosonFilmzBundle:Comments c
            WHERE c.film = :id'
            )->setParameter('id', $id);

        try {
            return $query->getArrayResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}