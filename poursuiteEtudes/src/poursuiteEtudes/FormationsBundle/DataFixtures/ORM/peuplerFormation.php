<?php
namespace moove\ActiviteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use poursuiteEtudes\FormationsBundle\Entity\Formation;

class PeuplerFormation extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $file = fopen(__DIR__ . "/peuplerFormation.csv", "r");

        while(true)
        {
            $line = fgetcsv($file, 0, ';');
            
            if(empty($line) || is_null($line))
                break;
            $temps = new Formation();
            $temps  ->setNiveau($line[1])
                    ->setNomComplet($line[2])
                    ->setSigle($line[3])
                    ->setPrivee($line[4])
                    ->setURL($line[5])
            ;
            $manager->persist($temps);
            $this->addReference("Formation-" . $line[0], $temps);
            
        }
        fclose($file);


        $manager->flush();
    }
    
    public function getOrder()
    {
        return 2; // avant User /!\
    }
}
?>