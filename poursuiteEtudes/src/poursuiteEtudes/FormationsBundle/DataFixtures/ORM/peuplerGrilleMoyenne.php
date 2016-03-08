<?php
namespace moove\ActiviteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use poursuiteEtudes\FormationsBundle\Entity\GrilleMoyenne;

class PeuplerGrilleMoyenne extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $file = fopen(__DIR__ . "/WorkSheet.csv", "r");
         
         $boucle=0;
         $coefAcda = 13.75;
         $coefApl = 9.25;
         $coefAsr = 12.75;
         $coefSgbd = 7.5;
         $coefWim = 6.75;
        
        fgetcsv($file, 0, ';');
        while(true)
        {
            
            $boucle++;
            
            $line = fgetcsv($file, 0, ';');
            
            if(empty($line) || is_null($line))
                break;
            $temps = new GrilleMoyenne();
            $moyMath = $this->getFloat($line[13]);
            $moyInfo = round(($this->getFloat($line[3])*$coefAcda+
                        $this->getFloat($line[5])*$coefApl+
                        $this->getFloat($line[7])*$coefAsr+
                        $this->getFloat($line[9])*$coefSgbd+
                        $this->getFloat($line[11])*$coefWim)/($coefAcda+$coefApl+$coefAsr+$coefSgbd+$coefWim),2);
            $moyPE = ($this->getFloat($line[24]));
            
            $temps  ->setMath($moyMath)
                    ->setInfo($moyInfo)
                    ->setPE($moyPE)
            ;
            $manager->persist($temps);
            $this->addReference("GrilleMoyenne-" . $boucle, $temps);
            
        }
        fclose($file);


        $manager->flush();
    }
    
    public function getFloat($case)
    {
        return floatval(str_replace(',', '.',$case));
    }
    
    public function getOrder()
    {
        return 1; // avant User /!\
    }
}
?>