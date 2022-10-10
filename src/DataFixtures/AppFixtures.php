<?php

namespace App\DataFixtures;

use App\Entity\ApprochType;
use App\Entity\Engagement;
use App\Entity\Equimpent;
use App\Entity\Exposure;
use App\Entity\Level;
use App\Entity\RockType;
use App\Entity\RoutProfil;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       $user = new User();
       $user->setFirstName('Niko')
           ->setLastName('Las')
           ->setEmail('niko.tiine@gmail.com')
           ->setPlainPassword('toto');
       $manager->persist($user);

       $exposures =['Nord','Sud','Est','Ouest'];
       foreach ($exposures as $exposure){
           $expo = new Exposure();
           $expo->setName($exposure);
           $manager->persist($expo);
       }

       $rockTypes =['Calcaire','Gneiss','Granit','Gres','Pouding'];
       foreach ($rockTypes as $type){
           $rocktype = new RockType();
           $rocktype->setName($type)
           ->setCreatedAt(new \DateTimeImmutable());
           $manager->persist($rocktype);
       }

       $engagments = ['Exposé','Engagé','Normal','Rapproche'];
       foreach ($engagments as $engagment){
           $eng = new Engagement();
           $eng->setName($engagment);
           $manager->persist($eng);
       }

       $approachTypes = ['En montee forte','En monte douce','plat','descente douce','descente raide'];
       foreach ($approachTypes as $type){
           $approachType = new ApprochType();
           $approachType->setName($type);
           $manager->persist($approachType);
       }

       $equipments = ['Broche','Plaquette','Friends'];
       foreach ($equipments as $equipment){
           $eqp = new Equimpent();
           $eqp->setName($equipment);
           $manager->persist($eqp);
       }

       $levels = [
           '4A','4B','4C',
           '5A','5A+','5B','5B+','5C','5C+',
           '6A','6A+','6B','6B+','6C','6C+',
           '7A','7A+','7B','7B+','7C','7C+',
           '8A','8A+','8B','8B+','8C','8C+',
           '9A','9A+','9B','9B+','9C'];

       foreach ($levels as $level){
           $lv = new Level();
           $lv->setName($level);
           $manager->persist($lv);
       }

       $profils = ['Dalle','Dever','Verical','Surplomb'];
       foreach ($profils as $profil){
           $pro = new RoutProfil();
           $pro->setName($profil);
           $manager->persist($pro);
       }

        $manager->flush();
    }
}
