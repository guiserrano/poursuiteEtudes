<?php

namespace poursuiteEtudes\FormationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MotCle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="poursuiteEtudes\FormationsBundle\Entity\MotCleRepository")
 */
class MotCle
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
     * @ORM\Column(name="mot", type="string", length=32)
     */
    private $mot;

    /**
     * @ORM\ManyToOne(targetEntity="poursuiteEtudes\FormationsBundle\Entity\Filiere")
     */

    private $filiere;

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
     * Set mot
     *
     * @param string $mot
     * @return MotCle
     */
    public function setMot($mot)
    {
        $this->mot = $mot;

        return $this;
    }

    /**
     * Get mot
     *
     * @return string 
     */
    public function getMot()
    {
        return $this->mot;
    }

    /**
     * Set filiere
     *
     * @param \poursuiteEtudes\FormationsBundle\Entity\Filiere $filiere
     * @return MotCle
     */
    public function setFiliere(\poursuiteEtudes\FormationsBundle\Entity\Filiere $filiere = null)
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Get filiere
     *
     * @return \poursuiteEtudes\FormationsBundle\Entity\Filiere 
     */
    public function getFiliere()
    {
        return $this->filiere;
    }
}
