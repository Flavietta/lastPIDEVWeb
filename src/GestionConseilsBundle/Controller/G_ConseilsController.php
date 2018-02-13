<?php

namespace GestionConseilsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class G_ConseilsController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionConseilsBundle:Default:index.html.twig');
    }
    public function AjoutAction(){
        return $this->render('GestionConseilsBundle:Default:ajout_conseils.html.twig');
    }
}
