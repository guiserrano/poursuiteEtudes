<?php
namespace moove\ActiviteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use poursuiteEtudes\FormationsBundle\Entity\MotCle;

class PeuplerMotCle extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $file = fopen(__DIR__ . "/peuplerMotCle.csv", "r");

        while(true)
        {
            $line = fgetcsv($file, 0, ';');
            if(empty($line) || is_null($line))
                break;
            $temps = new MotCle();
            $temps  ->setMot($line[0])
                    ;
		            
            $manager->persist($temps);
            $this->addReference("MotCle-" . $line[0], $temps);
            
        }
        fclose($file);


        $manager->flush();
    }
    
    public function getOrder()
    {
        return 1; // avant User /!\
    }
}
?>