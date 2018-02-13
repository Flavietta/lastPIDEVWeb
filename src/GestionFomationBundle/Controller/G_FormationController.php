<?php

namespace GestionFomationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class G_FormationController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionFomationBundle:Default:index.html.twig');
    }
    public function AjoutAction(){
        return $this->render('GestionFomationBundle:Default:ajout_formation.html.twig');
    }

}

