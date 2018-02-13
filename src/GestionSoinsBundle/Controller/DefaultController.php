<?php

namespace GestionSoinsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionSoinsBundle:Default:index.html.twig');
    }
}
