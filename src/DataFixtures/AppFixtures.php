<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Group;
use App\Entity\Loan;
use App\Entity\Ressource;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1 = new Category();
        $category1->setLabel("Photos");
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setLabel("Vidéos");
        $manager->persist($category2);

        $group1 = new Group();
        $group1->setLabel('Licence professionnelle');
        $manager->persist($group1);

        $user1 = new User();
        $user1->setFirstname('Lucile');
        $user1->setLastname('Velut');
        $user1->setEmail('lucilevelut@orange.fr');
        $user1->setPassword(password_hash('test', null));
        $user1->setRoles([]);
        $user1->setGroup($group1);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setFirstname('Anthony');
        $user2->setLastname('Devoize');
        $user2->setEmail('anthony.devoize@gmail.com');
        $user2->setPassword('test');
        $user2->setRoles([]);
        $user2->setGroup($group1);
        $manager->persist($user2);

        $ressource1 = new Ressource();
        $ressource1->setLabel("Caméra");
        $manager->persist($ressource1);

        $ressource2 = new Ressource();
        $ressource2->setLabel("Trépied caméra");
        $manager->persist($ressource2);

        $ressource3 = new Ressource();
        $ressource3->setLabel("Micro");
        $manager->persist($ressource3);

        $loan1 = new Loan();
        $loan1->setCreatedAt(new \DateTime('now'));
        $loan1->setFinishedAt(new \DateTime('tomorrow'));
        $loan1->setRessource($ressource1);
        $loan1->setUser($user1);
        $manager->persist($loan1);

        $manager->flush();
    }
}
