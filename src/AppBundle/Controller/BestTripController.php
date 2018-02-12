<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Connexion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\UserType;

class BestTripController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    /**
     * @Route("/inscription")
     */

    public function inscriptionAction (Request $request)

    {
        $user = new User();
        $form=$this->createForm(UserType::class,$user);
        $formView=$form->createView();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())

        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }


        return $this->render ( 'inscription.html.twig',array('form'=>$formView));
    }

    /**
     * @Route("/connexion")
     */

    public function connexionAction (Request $request)

    {
        $user = new User();
        $form=$this->createForm(Connexion::class,$user);
        $formView=$form->createView();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())

        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }


        return $this->render ( 'inscription.html.twig',array('form'=>$formView));
    }

















}
