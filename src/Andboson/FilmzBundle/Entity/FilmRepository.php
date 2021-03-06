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

    public function findBySlug($slug)
    {

        $query = $this->getEntityManager()
            ->createQuery('
            SELECT f FROM AndbosonFilmzBundle:Film f
            WHERE f.slug = :slug'
            )->setParameter('slug', $slug );

        try {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    public function findByCategorySlag($slug)
    {

        $query = $this->getEntityManager()
            ->createQuery('
            SELECT f FROM AndbosonFilmzBundle:Film f
            JOIN f.category c
            WHERE c.slug = :slug'
            )->setParameter('slug', $slug );

        try {
            return $query->getArrayResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }


    public function findByCategorySlugAndGenreSlug($slug, $gslug)
    {
        $query = $this->getEntityManager()
            ->createQuery('
            SELECT f FROM AndbosonFilmzBundle:Film f
            JOIN f.genre g
            JOIN f.category c
            WHERE g.slug = :gslug AND c.slug = :slug'
            )->setParameters(Array('slug' => $slug, 'gslug' => $gslug ));
        try {
            $t = $query->getSingleResult();
            print_r( $t.category.na);
            return $query->getArrayResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
