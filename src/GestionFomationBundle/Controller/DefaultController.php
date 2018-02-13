<?php

namespace GestionFomationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionFomationBundle:Default:index.html.twig');
    }
}
