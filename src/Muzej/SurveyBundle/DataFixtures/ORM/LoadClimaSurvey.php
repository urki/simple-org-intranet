<?php

/*
 * insert datafixtures form clima survey entity.
 */

namespace Muzej\SurveyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Muzej\SurveyBundle\Entity\Survey;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $clima1 = new Survey();
        $clima1->setName('Trgovina');
        $clima1->setTime(new \DateTime('now'));
        $clima1->setDate(new \DateTime('today'));
        $clima1->setTemperature('8,2');
        $clima1->setMoisture('50,0');
        $clima1->setNote('zaslon je poškodaovan');
   
        
        $manager->persist($clima1);
        
        $clima2 = new Survey();
        $clima2->setName('Gostilna');
        $clima2->setTime(new \DateTime('now'));
        $clima2->setDate(new \DateTime('today'));
        $clima2->setTemperature('10,2');
        $clima2->setMoisture('61');
  
        
        $manager->persist($clima2); 
        
        $manager->flush();
    }
}
?>
