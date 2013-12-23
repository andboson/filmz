<?php
//namespace Andboson;
namespace References\Fixture\ORM;

use Andboson\FilmzBundle\Entity\Genre;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadGenreData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * {@inheritDoc}
    */
    public function load(ObjectManager $manager)
    {
        $genre = new Genre();
        $genre->setName('Комедия');
        $genre->setSlug('comedy');
        $manager->persist($genre);

        $this->addReference('genreComedy', $genre);

        $genre = new Genre();
        $genre->setName('Приключения');
        $genre->setSlug('adventures');
        $manager->persist($genre);

        $this->addReference('genreAdventure', $genre);

        $genre = new Genre();
        $genre->setName('Драма');
        $genre->setSlug('drama');
        $manager->persist($genre);

        $this->addReference('genreDrama', $genre);

        $genre = new Genre();
        $genre->setName('Фантастика');
        $genre->setSlug('scifi');
        $manager->persist($genre);

        $this->addReference('genreScifi', $genre);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}