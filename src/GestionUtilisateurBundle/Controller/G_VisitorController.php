<?php

namespace GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class G_VisitorController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionUtilisateurBundle:Default:index.html.twig');
    }
    public function AfficheVisitorAction()
    {
        return $this->render('GestionUtilisateurBundle:VisitorViews:affiche.html.twig');
    }

}
