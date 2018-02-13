<?php

namespace GestionSoinsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class G_SoinsController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionSoinsBundle:Default:index.html.twig');
    }
    public function AjoutAction(){
        return $this->render('GestionSoinsBundle:Default:ajout_soins.html.twig');
    }
}
