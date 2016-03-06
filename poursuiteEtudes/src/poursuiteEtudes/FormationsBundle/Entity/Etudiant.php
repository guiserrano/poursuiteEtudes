<?php

namespace poursuiteEtudes\FormationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="poursuiteEtudes\FormationsBundle\Entity\EtudiantRepository")
 */
class Etudiant
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
     * @ORM\Column(name="nom", type="string", length=32)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=32)
     */
     
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="anneeDiplome", type="integer")
     */
    private $anneeDiplome;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
     
    private $rang;
    
    /**
     * @var string
     *
     * @ORM\Column(name="parcours", type="string", length=3)
     */
    private $parcours;

    /**
     * @ORM\ManyToOne(targetEntity="poursuiteEtudes\FormationsBundle\Entity\Filiere")
     */

    private $filiere;

   /**
     * @ORM\OneToOne(targetEntity="poursuiteEtudes\FormationsBundle\Entity\GrilleMoyenne")
     */

    private $grillemoyenne;


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
     * Set nom
     *
     * @param string $nom
     * @return Etudiant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Etudiant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set anneeDiplome
     *
     * @param integer $anneeDiplome
     * @return Etudiant
     */
     
    public function setAnneeDiplome($anneeDiplome)
    {
        $this->anneeDiplome = $anneeDiplome;

        return $this;
    }

    /**
     * Get anneeDiplome
     *
     * @return integer 
     */
    public function getAnneeDiplome()
    {
        return $this->anneeDiplome;
    }

    /**
     * Set rang
     *
     * @param integer $rang
     * @return Etudiant
     */
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get rang
     *
     * @return integer 
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set parcours
     *
     * @param string $parcours
     * @return Etudiant
     */
    public function setParcours($parcours)
    {
        $this->parcours = $parcours;

        return $this;
    }

    /**
     * Get parcours
     *
     * @return string 
     */
    public function getParcours()
    {
        return $this->parcours;
    }

    /**
     * Set filiere
     *
     * @param \poursuiteEtudes\FormationsBundle\Entity\Filiere $filiere
     * @return Etudiant
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
    
    /**
     * Set grillemoyenne
     *
     * @param \poursuiteEtudes\FormationsBundle\Entity\GrilleMoyenne $grillemoyenne
     * @return Etudiant
     */
    public function setGrillemoyenne(\poursuiteEtudes\FormationsBundle\Entity\GrilleMoyenne $grillemoyenne = null)
    {
        $this->grillemoyenne = $grillemoyenne;

        return $this;
    }

    /**
     * Get grillemoyenne
     *
     * @return \poursuiteEtudes\FormationsBundle\Entity\GrilleMoyenne 
     */
    public function getGrillemoyenne()
    {
        return $this->grillemoyenne;
    }
}