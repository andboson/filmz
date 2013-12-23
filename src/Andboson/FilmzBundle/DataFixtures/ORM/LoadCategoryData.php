<?php
//namespace Andboson;
namespace References\Fixture\ORM;

use Andboson\FilmzBundle\Entity\Category;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * {@inheritDoc}
    */
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Фильм');
        $category->setSlug('Film');

        $manager->persist($category);
        $this->addReference('catFilm', $category);

        $category = new Category();
        $category->setName('Мультфильм');
        $category->setSlug('cartoon');

        $manager->persist($category);
        $this->addReference('catCartoon', $category);

        $category = new Category();
        $category->setName('Концерт');
        $category->setSlug('concert');

        $manager->persist($category);
        $this->addReference('catConcert', $category);

        $category = new Category();
        $category->setName('Сериал');
        $category->setSlug('serial');

        $manager->persist($category);
        $this->addReference('catSerial', $category);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}