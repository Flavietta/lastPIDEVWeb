<?php

namespace GestionProduitsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class G_ProduitController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionProduitsBundle:Default:index.html.twig');
    }
    public function AfficherProduitUserAction()
    {
        return $this->render('@GestionProduits/Default/afficherProduit.html.twig');
    }


    public function ajoutProduitUserAction()
    {
        return $this->render('@GestionProduits/Default/ajoutProduit.html.twig');
    }
    public function AfficheAction()
    {
        return $this->render('@GestionProduits/Produit_A_Views/Affiche.html.twig');
    }
}
