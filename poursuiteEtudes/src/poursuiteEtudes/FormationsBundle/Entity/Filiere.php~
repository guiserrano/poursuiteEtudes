<?php

namespace poursuiteEtudes\FormationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filiere
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="poursuiteEtudes\FormationsBundle\Entity\FiliereRepository")
 */
class Filiere
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
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=512)
     */
    private $intitule;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alternance", type="boolean")
     */
    private $alternance;

    /**
     * @var string
     *
     * @ORM\Column(name="remarques", type="string", length=1024)
     */
    private $remarques;

    /**
     * @ORM\ManyToOne(targetEntity="poursuiteEtudes\FormationsBundle\Entity\Formation")
     */

    private $formation;

    /**
     * @ORM\ManyToMany(targetEntity="poursuiteEtudes\FormationsBundle\Entity\MetierVise")
     */

    private $metierVise;

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
     * Set intitule
     *
     * @param string $intitule
     * @return Filere
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set alternance
     *
     * @param boolean $alternance
     * @return Filere
     */
    public function setAlternance($alternance)
    {
        $this->alternance = $alternance;

        return $this;
    }

    /**
     * Get alternance
     *
     * @return boolean 
     */
    public function getAlternance()
    {
        return $this->alternance;
    }

    /**
     * Set remarques
     *
     * @param string $remarques
     * @return Filere
     */
    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;

        return $this;
    }

    /**
     * Get remarques
     *
     * @return string 
     */
    public function getRemarques()
    {
        return $this->remarques;
    }
}
