<?php
namespace moove\ActiviteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use poursuiteEtudes\FormationsBundle\Entity\MetierVise;

class PeuplerMetierVise extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $file = fopen(__DIR__ . "/peuplerMetierVise.csv", "r");

        while(true)
        {
            $line = fgetcsv($file, 0, ';');
            
            if(empty($line) || is_null($line))
                break;
            $temps = new MetierVise();
            $temps  ->setLibelle($line[0])
            ;
            $manager->persist($temps);
            $this->addReference("MetierVise-" . $line[0], $temps);
            
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