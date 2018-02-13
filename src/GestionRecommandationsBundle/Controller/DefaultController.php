<?php

namespace GestionRecommandationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionRecommandationsBundle:Default:index.html.twig');
    }
}
