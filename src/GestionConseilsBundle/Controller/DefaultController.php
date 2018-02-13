<?php

namespace GestionConseilsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionConseilsBundle:Default:index.html.twig');
    }
}
