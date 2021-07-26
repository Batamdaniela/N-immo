<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="index_accueil")
     */
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/admin", name="index_accueil")
     */
    public function index_admin(): Response
    {
        // return $this->render('accueil/admin.html.twig', [
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/admin", name="index_client")
     */
    public function index_client(): Response
    {
        return $this->render('accueil/admin.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

/*    
     * @Route("/", name="accueil")
     *
    public function accueil(): Response
    {
        return $this->render('accueil/index.html.twig');
    } */


}
