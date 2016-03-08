<?php/*
namespace moove\ActiviteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use poursuiteEtudes\FormationsBundle\Entity\GrilleMoyenne;

class PeuplerWorkSheet extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $file = fopen(__DIR__ . "/WorkSheet.csv", "r");

        while(true)
        {
            $line = fgetcsv($file, 0, ',', '"');
            
            if(empty($line) || is_null($line))
                break;
            $temps = new GrilleMoyenne();
            $temps  ->setMath($line[4])
                    ->setInfo($line[2])
                    ->setPE($line[3])
            ;
            $manager->persist($temps);
            $this->addReference("GrilleMoyenne-" . $line[0], $temps);
            
            
        }
        fclose($file);


        $manager->flush();
    }
    
    public function getOrder()
    {
        return 0; // avant User /!\
    }
}
*/
?>

