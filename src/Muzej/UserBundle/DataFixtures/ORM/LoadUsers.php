<?php

/*
 * insert datafixtures form clima survey entity.
 */

namespace Muzej\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Muzej\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Serializable;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadUsers extends AbstractFixture implements  ContainerAwareInterface, OrderedFixtureInterface, Serializable {

    private $container;

    public function load(ObjectManager $manager) {
        $user = new User();
        $user->setUsername('user');
        $user->setEmail('user@me.com');
        $user->setPassword($this->encodePassword($user, 'user'));
        $manager->persist($user);

        $this->addReference('user-user', $user);
                
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setEmail('admin@me.com');
        $admin->setPassword($this->encodePassword($admin, 'admin'));
        $admin->setRoles(array('ROLE_ADMIN'));
        $admin->setIsActive(true);
        $manager->persist($admin);


        $manager->flush();
    }

    public function setContainer(\Symfony\Component\DependencyInjection\ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function encodePassword($user, $plainPassword) {
        $encoder = $this->container->get('security.encoder_factory')
                ->getEncoder($user);
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }

    public function serialize() {
        return serialize(array('id' => $this->getId()));
    }

    public function unserialize($serialized) {
        $data = unserialize($serialized);
        $this->id = $data['id'];
    }

    public function getOrder() {
        return 10;
    }

}

?>
