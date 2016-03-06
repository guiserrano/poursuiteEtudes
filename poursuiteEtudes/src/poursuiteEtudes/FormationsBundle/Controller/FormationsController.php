<?php

namespace poursuiteEtudes\FormationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use poursuiteEtudes\FormationsBundle\Etudiant;

class FormationsController extends Controller
{
    public function accueilVisiteurAction()

    {   //recup la liste des formations  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsVisiteur:accueilVisiteur.html.twig');
    }
    public function statsVisiteurAction()

    {   //recup la liste des formations  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsVisiteur:statsVisiteur.html.twig');
    }
     public function ecoleIngeVisiteurAction()

    {   //recup la liste des formations  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsVisiteur:ecoleIngeVisiteur.html.twig');
    }
     public function licenseVisiteurAction()

    {   //recup la liste des formations  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsVisiteur:licenseVisiteur.html.twig');
    }
     public function licenseProVisiteurAction()

    {   //recup la liste des formations  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsVisiteur:licenseProVisiteur.html.twig');
    }
    
    
    public function informationsBulletinPEVisiteurAction()

    {   //recup la liste des formations  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsVisiteur:informationsBulletinPEVisiteur.html.twig');
    }
    
    public function informationsCandidaterVisiteurAction()

    {   //recup la liste des formations  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsVisiteur:informationsCandidaterVisiteur.html.twig');
    }
    
    public function informationsDescriptifParcoursVisiteurAction()

    {   //recup la liste des formations  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsVisiteur:informationsDescriptifParcoursVisiteur.html.twig');
    }
    
     public function adminAction()

    {   //recup la liste des formations  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:admin.html.twig');
    }
    
     public function etudiantAdminAction()

    {   //recup la liste des etudiants  
        // $formations=
        $request = Request::createFromGlobals();
        $type = $request->query->get('type');
        $order = $this->getOrderBy($request->query->get('order'));
        
        
        if (is_null($type))
            $type = "DESC";
        $nbResultatPage=6;
        
            
        $repEtudiant = $this->getDoctrine()->getManager()->getRepository('poursuiteEtudesFormationsBundle:Etudiant');
        $tabEtudiantAdmin = $repEtudiant->findByEtudiantOrder($order, $type);
        $tabEtudiantAdminFinal = $this->get('knp_paginator')->paginate($tabEtudiantAdmin, $request->query->getInt('page', 1), $nbResultatPage);
        
        
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:etudiantAdmin.html.twig', array('tabEtudiant'=> $tabEtudiantAdminFinal));
        
    }
    
    public function getOrderBy ($order)
    {
        switch ($order)
        {
        case 'rang' : return 'e.rang'; break;
        case 'nom' : return 'e.nom'; break;
        case 'prenom' : return 'e.prenom'; break;
        case 'anneeDiplome' : return 'e.anneeDiplome'; break;
        case 'filiere' : return 'f.intitule'; break;
        case 'grillemoyenneMaht' : return 'gm.math'; break;
        case 'grillemoyenneInfo' : return 'gm.info'; break;
        case 'grillemoyennePE': return 'gm.PE'; break;
        default : return 'e.rang'; break;
        }
    }
    
     public function ecoleIngeAdminAction()

    {   //recup la liste des etudiants  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:ecoleIngeAdmin.html.twig');
    }
    
    
     public function informationsAdminAction()

    {   //recup la liste des etudiants  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:informationsAdmin.html.twig');
    }
    
    public function informationsBulletinPEAction()
    
    {   //recup la liste des etudiants  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:informationsBulletinPE.html.twig');
    }
    
    public function informationsDescriptifParcoursAction()
    
    {   //recup la liste des etudiants  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:informationsDescriptifParcours.html.twig');
    }
    
    public function informationsCandidaterAction()
    
    {   //recup la liste des etudiants  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:informationCandidater.html.twig');
    }
    
     public function licencesAdminAction()

    {   //recup la liste des etudiants  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:licenceAdmin.html.twig');
    }
    
     public function licencesProAdminAction()

    {   //recup la liste des etudiants  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:licenceProAdmin.html.twig');
    }
    
     public function nouvelleAnneeAction()

    {   //recup la liste des etudiants  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:nouvelleAnneeAdmin.html.twig');
    }
    
     public function statsAdminAction()

    {   //recup la liste des etudiants  
        // $formations=
         return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:statsAdmin.html.twig');
        
    }
    

    public function ajouterEcoleIngeAction()
    
    {   //recup la liste des etudiants  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:formulaireEcoleInge.html.twig');
    }
    
    public function ajouterLicenceProAction()
    
    {   //recup la liste des etudiants  
        // $formations=
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:formulaireLicencePro.html.twig');
    }
    
    public function graphTabEtudiantAdminAction()
    {
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:tabEtudiant.html.twig');
    }

   }