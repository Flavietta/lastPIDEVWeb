<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Controller;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use GestionProduitsBundle\Entity\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Controller managing the user profile.
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ProfileController extends Controller
{
    /**
     * Show the user.
     */
    public function testAction(){
        return $this->render('@FOSUser/Profile/Test_Content.html.twig');
    }
    public function showAction()
    {

        $user = $this->getUser();
        $userID = $this->getUser()->getId();

        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        if($user->hasRole('ROLE_ADMIN'))

            return $this->render('@FOSUser/Profile/show.html.twig', array(

            'user' => $user,
        ));
        elseif($user->hasRole('ROLE_SUPER_USER'))

            return $this->render('@FOSUser/Profile/show3.html.twig', array(

                'user' => $user,
            ));


        $em = $this->getDoctrine()->getManager();
        $Prod = $em->getRepository("GestionProduitsBundle:Produit")->findAll();

        $em = $this->getDoctrine()->getRepository(Panier::class);
        $n = $em->compteur($user->getUsername());
        $notif = $em->compteurNotif($userID);
        $message = $em->compteurMessage($userID);


        return $this->render('@FOSUser/Profile/show2.html.twig', array(

            'user' => $user, 'Prod' => $Prod, 'nb' => $n, 'notif' => $notif, 'message' => $message
        ));

    }

    /**
     * Edit the user.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function editAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        /** @var $formFactory FactoryInterface */
        $formFactory = $this->get('fos_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var $userManager UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_SUCCESS, $event);

            $userManager->updateUser($user);

            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('fos_user_profile_show');
                $response = new RedirectResponse($url);
            }

            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

            return $response;
        }

        return $this->render('@FOSUser/Profile/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }




    public function ajoutPanierAction(Request $request, $usernameP, $idp, $idUser)


    {

        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");

        $userID = $this->getUser()->getId();
        $usernameWanter = $this->getUser()->getUsername();

        if ($request->getMethod() == 'POST') {

            $em = $this->getDoctrine()->getManager();
            $idproduitPanier = $idp;
            $nomProduiPanier = $usernameP;

            $user = $this->getUser();
            $Prod = $em->getRepository("GestionProduitsBundle:Produit")->findAll();


            if ($usernameWanter == $usernameP) {

                $user = $this->getUser();
                $Prod = $em->getRepository("GestionProduitsBundle:Produit")->findAll();

                $em = $this->getDoctrine()->getRepository(Panier::class);
                $n = $em->compteur($usernameWanter);

                $notif = $em->compteurNotif($userID);
                $message = $em->compteurMessage($userID);

                return $this->render('@FOSUser/Profile/show2.html.twig', array(

                    'user' => $user, 'Prod' => $Prod, 'nb' => $n, 'notif' => $notif, 'message' => $message
                ));
            } /*
           if($pan= $em->getRepository('GestionProduitsBundle:Panier')->findOneBy(array('idproduitpanier'=>$idproduitPanier ) )->getIdproduitpanier() == $idp){

               $user = $this->getUser();
               $Prod=$em->getRepository("GestionProduitsBundle:Produit")->findAll();

               $em=$this->getDoctrine()->getRepository(Panier::class);
               $n=$em->compteur($usernameWanter) ;

               $notif=$em->compteurNotif($userID) ;
               $message=$em->compteurMessage($userID) ;

               return $this->render('@FOSUser/Profile/show2.html.twig', array(

                   'user' => $user,'Prod'=>$Prod,'nb'=>$n ,'notif'=>$notif ,'message'=>$message
               ));

           }


*/
            else {
                $nomp = $request->get('nomp');


                $Panier = new Panier();
                $Panier->setIdproduitpanier($idproduitPanier);
                $Panier->setOwner($nomProduiPanier);

                $Panier->setNomproduit($nomp);
                $Panier->setIdowner($idUser);
                $Panier->setWanter($userID);
                $Panier->setWantername($usernameWanter);

                // tells Doctrine you want to (eventually) save the Product (no queries yet)
                $em->persist($Panier);

                // actually executes the queries (i.e. the INSERT query)
                $em->flush();


                $em = $this->getDoctrine()->getRepository(Panier::class);
                $n = $em->compteur($usernameWanter);
                $notif = $em->compteurNotif($userID);
                $message = $em->compteurMessage($userID);


            }

            return $this->render('@FOSUser/Profile/show2.html.twig', array(

                'user' => $user, 'Prod' => $Prod, 'nb' => $n, 'notif' => $notif, 'message' => $message
            ));

        }
    }


    public function ajoutmapAction(Request $request)
    {


        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");

        $username = $this->getUser()->getUsername();
        $userID = $this->getUser()->getId();

        $em = $this->getDoctrine()->getManager();


        $user = $this->getUser();
        $Prod = $em->getRepository("GestionProduitsBundle:Produit")->findAll();

        if ($request->getMethod() == 'POST') {

            $em = $this->getDoctrine()->getManager();
            $Produit = $em->getRepository(Produit::class)->FindProduit($userID);

            $ville = $request->get('ville');


            $Produit->setVille($ville);

            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($Produit);

            // actually executes the queries (i.e. the INSERT query)
            $em->flush();


        }


        $em = $this->getDoctrine()->getRepository(Panier::class);
        $n = $em->compteur($username);
        $notif = $em->compteurNotif($userID);
        $message = $em->compteurMessage($userID);




        return $this->render('@FOSUser/Profile/show2.html.twig', array(

            'user' => $user, 'Prod' => $Prod, 'nb' => $n, 'notif' => $notif, 'message' => $message
        ));

    }



















}
