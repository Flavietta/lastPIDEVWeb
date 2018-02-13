<?php

namespace GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class G_SimpleUserController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionUtilisateurBundle:Default:index.html.twig');
    }
    public function AfficheAction()
    {
        return $this->render('GestionUtilisateurBundle:SimpleUserViews:Affiche.html.twig');
    }
    public function index1Action()
    {
        return $this->render('GestionUtilisateurBundle:SimpleUserViews:afficherUser.html.twig');
    }

}
