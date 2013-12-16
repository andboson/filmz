<?php

namespace Andboson\FilmzBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FilmRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FilmRepository extends EntityRepository
{

    public function findByCategoryId($id)
    {

        $query = $this->getEntityManager()
            ->createQuery('
            SELECT f FROM AndbosonFilmzBundle:Film f
            WHERE f.category = :id'
            )->setParameter('id', $id );

        try {
            return $query->getArrayResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }


    public function findByCategoryIdAndGenreId($id, $gid)
    {

        $query = $this->getEntityManager()
            ->createQuery('
            SELECT f FROM AndbosonFilmzBundle:Film f
            WHERE f.category = :id 
            AND f.genre = :gid'
            )->setParameter('id', $id )
            ->setParameter('gid', $gid );

        try {
            return $query->getArrayResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
