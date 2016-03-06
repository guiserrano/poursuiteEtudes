<?php
namespace moove\ActiviteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use poursuiteEtudes\FormationsBundle\Entity\Etudiant;

class PeuplerEtudiant extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $file = fopen(__DIR__ . "/peuplerEtudiant.csv", "r");

        while(true)
        {
            $line = fgetcsv($file, 0, ';');
            
            if(empty($line) || is_null($line))
                break;
            $temps = new Etudiant();
            $temps  ->setNom($line[1])
                    ->setPrenom($line[2])
                    ->setAnneeDiplome($line[3])
                    ->setRang($line[4])
                    ->setParcours($line[5])
                    ->setFiliere($this->getReference('Filiere-'. $line[6]))
                    ->setGrillemoyenne($this->getReference('GrilleMoyenne-'. $line[7]))
            ;
            $manager->persist($temps);
            $this->addReference("Etudiant-" . $line[0], $temps);
            
        }
        fclose($file);


        $manager->flush();
    }
    
    public function getOrder()
    {
        return 5; // avant User /!\
    }
}
?>

