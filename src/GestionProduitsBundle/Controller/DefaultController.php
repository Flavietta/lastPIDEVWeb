<?php

namespace GestionProduitsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionProduitsBundle:Default:index.html.twig');
    }
}
