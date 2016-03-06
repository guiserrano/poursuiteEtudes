<?php

namespace poursuiteEtudes\FormationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetierVise
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="poursuiteEtudes\FormationsBundle\Entity\MetierViseRepository")
 */
class MetierVise
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
     * @ORM\Column(name="libelle", type="string", length=32)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity="poursuiteEtudes\FormationsBundle\Entity\Filiere")
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
     * Constructor
     */
    public function __construct()
    {
        $this->filiere = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return MetierVise
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Add filiere
     *
     * @param \poursuiteEtudes\FormationsBundle\Entity\Filiere $filiere
     * @return MetierVise
     */
    public function addFiliere(\poursuiteEtudes\FormationsBundle\Entity\Filiere $filiere)
    {
        $this->filiere[] = $filiere;

        return $this;
    }

    /**
     * Remove filiere
     *
     * @param \poursuiteEtudes\FormationsBundle\Entity\Filiere $filiere
     */
    public function removeFiliere(\poursuiteEtudes\FormationsBundle\Entity\Filiere $filiere)
    {
        $this->filiere->removeElement($filiere);
    }

    /**
     * Get filiere
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFiliere()
    {
        return $this->filiere;
    }
}