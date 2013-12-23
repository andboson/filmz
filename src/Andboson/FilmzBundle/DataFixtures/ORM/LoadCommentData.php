<?php
//namespace Andboson;
namespace References\Fixture\ORM;

use Andboson\FilmzBundle\Entity\Comments;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadCommentsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
    * {@inheritDoc}
    */
    public function load(ObjectManager $manager)
    {
        $comment = new Comments();
        $comment->setAuthorName('Илья');
        $comment->setAuthorEmail('test@g.com');
        $comment->setAuthorIp('127.0.0.1');
        $comment->setMessage('Лучший фильм!');
        $comment->setRate(5);
        $comment->setFilm($this->getReference('film'));
        $manager->persist($comment);
        $manager->flush();

        $comment = new Comments();
        $comment->setAuthorName('Андрей');
        $comment->setAuthorEmail('drew@google.com');
        $comment->setAuthorIp('127.0.0.1');
        $comment->setMessage('Хорош! Но книга лучше )');
        $comment->setRate(4);
        $comment->setFilm($this->getReference('film'));
        $manager->persist($comment);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}