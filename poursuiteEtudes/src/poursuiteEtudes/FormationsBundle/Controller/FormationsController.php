<?php

namespace poursuiteEtudes\FormationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        return $this->render('poursuiteEtudesFormationsBundle:FormationsAdmin:etudiantAdmin.html.twig');
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
}
