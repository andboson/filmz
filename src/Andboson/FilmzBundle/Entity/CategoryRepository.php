<?php

namespace Andboson\FilmzBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    public function findBySlug($slug)
    {
        $query = $this->getEntityManager()
            ->createQuery('
            SELECT c FROM AndbosonFilmzBundle:Category c
            WHERE c.slug = :slug'
            )->setParameters(Array('slug' => $slug ));
        try {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
