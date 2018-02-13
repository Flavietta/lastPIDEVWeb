<?php

namespace GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class G_SuperUserController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionUtilisateurBundle:Default:index.html.twig');
    }

    public function Affiche1Action(){
        return $this->render('GestionUtilisateurBundle:SuperUserViews:afficherUserPriviligie.html.twig');
    }
    public function AfficheAction()
    {
        return $this->render('GestionUtilisateurBundle:SuperUserViews:Affiche.html.twig');
    }
    public function AjouterAction(){
        return $this->render('GestionUtilisateurBundle:SuperUserViews:Ajouter.html.twig');
    }

    }
