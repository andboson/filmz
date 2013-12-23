<?php
//namespace Andboson;
namespace References\Fixture\ORM;

use Andboson\FilmzBundle\Entity\Film;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\Validator\Constraints\DateTime;


class LoadFilmData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * {@inheritDoc}
    */
    public function load(ObjectManager $manager)
    {
        $film = new Film();
        $film->setName('Самолеты');
        $film->setReleaseDate( new \DateTime('2013-08-01') );
        $film->setPoster('http://upload.wikimedia.org/wikipedia/en/7/7b/Planes_FilmPoster.jpeg');
        $film->setDescription('Продолжение Тачки и Таски 2. Теперь про самолеты )');
        $film->setLink('http://en.wikipedia.org/wiki/Planes_(film)');
        $film->setDirector('Klay Hall');
        $film->setRating('3');
        $film->setCategory($this->getReference('catCartoon'));
        $film->addGenre($this->getReference('genreComedy'));
        $film->addGenre($this->getReference('genreAdventure'));
        $manager->persist($film);

        $manager->flush();

        $film = new Film();
        $film->setName('Вольт');
        $film->setReleaseDate( new \DateTime('20008-08-01') );
        $film->setPoster('http://upload.wikimedia.org/wikipedia/en/4/44/Bolt_ver2.jpg');
        $film->setDescription('Отважный пес спасает вселенную');
        $film->setLink('http://en.wikipedia.org/wiki/Bolt_(2008_film)');
        $film->setDirector('Chris Williams');
        $film->setRating('5');
        $film->setCategory($this->getReference('catCartoon'));
        $film->addGenre($this->getReference('genreDrama'));
        $film->addGenre($this->getReference('genreAdventure'));
        $manager->persist($film);

        $manager->flush();

        $film = new Film();
        $film->setName('Затерянные');
        $film->setReleaseDate( new \DateTime('2008-08-01') );
        $film->setPoster('http://media.kino-govno.com/tv/l/lost/posters/lost_5.jpg');
        $film->setDescription('Лучший сериал из серии "Таинственный остров"');
        $film->setLink('http://en.wikipedia.org/wiki/Lost_(TV_series)');
        $film->setDirector('J. J. Abrams');
        $film->setRating('5');
        $film->setCategory($this->getReference('catSerial'));
        $film->addGenre($this->getReference('genreDrama'));
        $film->addGenre($this->getReference('genreAdventure'));
        $manager->persist($film);

        $manager->flush();

        $film = new Film();
        $film->setName('Автостопом по галактике');
        $film->setReleaseDate( new \DateTime('2006-08-01') );
        $film->setPoster('
        http://www.posternation.com/image/view/the-hitchhiker-s-guide-to-the-galaxy-1-186614');
        $film->setDescription('Замечательный фильм о приключениях землянина в космосе');
        $film->setLink('http://www.imdb.com/title/tt0371724/');
        $film->setDirector('Garth Jennings');
        $film->setRating('4');
        $film->setCategory($this->getReference('catFilm'));
        $film->addGenre($this->getReference('genreScifi'));
        $film->addGenre($this->getReference('genreAdventure'));
        $manager->persist($film);
        $this->addReference('film', $film);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}