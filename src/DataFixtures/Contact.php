<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Contact extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $contacts = [
            new \App\Entity\Contact('Jeanne', 'Julien', 'julien@hotmail.com', 'ui', 'Oui', false),
            new \App\Entity\Contact('Bernard', 'Tuffe', 'bernad@hotmail.com', 'ua', 'Non', true),
            new \App\Entity\Contact('Michel', 'Pims', 'michel@hotmail.com', 'uo', 'Non', false),
            new \App\Entity\Contact('Jigo', 'Kurch', 'jigo@hotmail.com', 'ue', 'Oui', false)
        ];

        foreach ($contacts as $contact) {
            $manager->persist($contact);
        }
        $manager->flush();
    }
}