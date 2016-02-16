<?php

namespace poursuiteEtudes\FormationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrilleMoyenne
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="poursuiteEtudes\FormationsBundle\Entity\GrilleMoyenneRepository")
 */
class GrilleMoyenne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="math", type="float")
     */
    private $math;

    /**
     * @var float
     *
     * @ORM\Column(name="info", type="float")
     */
    private $info;

    /**
     * @var float
     *
     * @ORM\Column(name="PE", type="float")
     */
    private $pE;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set math
     *
     * @param float $math
     * @return GrilleMoyenne
     */
    public function setMath($math)
    {
        $this->math = $math;

        return $this;
    }

    /**
     * Get math
     *
     * @return float 
     */
    public function getMath()
    {
        return $this->math;
    }

    /**
     * Set info
     *
     * @param float $info
     * @return GrilleMoyenne
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return float 
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set pE
     *
     * @param float $pE
     * @return GrilleMoyenne
     */
    public function setPE($pE)
    {
        $this->pE = $pE;

        return $this;
    }

    /**
     * Get pE
     *
     * @return float 
     */
    public function getPE()
    {
        return $this->pE;
    }
}
