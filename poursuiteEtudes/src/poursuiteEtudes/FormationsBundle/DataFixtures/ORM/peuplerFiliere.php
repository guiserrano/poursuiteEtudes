<?php
namespace moove\ActiviteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use poursuiteEtudes\FormationsBundle\Entity\Filiere;

class PeuplerFiliere extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $file = fopen(__DIR__ . "/peuplerFiliere.csv", "r");

        while(true)
        {
            $line = fgetcsv($file, 0, ';');
            
            if(empty($line) || is_null($line))
                break;
            $temps = new Filiere();
            $temps  ->setIntitule($line[1])
                    ->setAlternance($line[2])
                    ->setRemarques($line[3])
                    ->setFormation($this->getReference("Formation-" . $line[4]))
                    ;
                    
		    /*if($line[3] != "")
                $temps->setRemarques($line[3]);
		    for($i = 4; $i < count($line); $i++)
                    {
                    $temps->addMotCle($this->getReference('MotCle-' . $line[$i]));
                    }
            */
            
            $manager->persist($temps);
            $this->addReference("Filiere-" . $line[0], $temps);
            
        }
        fclose($file);

        $manager->flush();
    }
    
    public function getOrder()
    {
        return 3; // avant User /!\
    }
}
?>