<?php

namespace GestionRecommandationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class G_RecommandationsController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionRecommandationsBundle:Default:index.html.twig');
    }
}
