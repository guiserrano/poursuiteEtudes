<?php

namespace poursuiteEtudes\FormationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Formation
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
     * @ORM\Column(name="niveau", type="string", length=16)
     */
    private $niveau;

    /**
     * @var string
     *
     * @ORM\Column(name="nomComplet", type="string", length=512)
     */
    private $nomComplet;

    /**
     * @var string
     *
     * @ORM\Column(name="sigle", type="string", length=16)
     */
    private $sigle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="privee", type="boolean")
     */
    private $privee;

    /**
     * @var string
     *
     * @ORM\Column(name="URL", type="string", length=256)
     */
    private $uRL;


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
     * Set niveau
     *
     * @param string $niveau
     * @return Formation
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set nomComplet
     *
     * @param string $nomComplet
     * @return Formation
     */
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    /**
     * Get nomComplet
     *
     * @return string 
     */
    public function getNomComplet()
    {
        return $this->nomComplet;
    }

    /**
     * Set sigle
     *
     * @param string $sigle
     * @return Formation
     */
    public function setSigle($sigle)
    {
        $this->sigle = $sigle;

        return $this;
    }

    /**
     * Get sigle
     *
     * @return string 
     */
    public function getSigle()
    {
        return $this->sigle;
    }

    /**
     * Set privee
     *
     * @param boolean $privee
     * @return Formation
     */
    public function setPrivee($privee)
    {
        $this->privee = $privee;

        return $this;
    }

    /**
     * Get privee
     *
     * @return boolean 
     */
    public function getPrivee()
    {
        return $this->privee;
    }

    /**
     * Set uRL
     *
     * @param string $uRL
     * @return Formation
     */
    public function setURL($uRL)
    {
        $this->uRL = $uRL;

        return $this;
    }

    /**
     * Get uRL
     *
     * @return string 
     */
    public function getURL()
    {
        return $this->uRL;
    }
}
