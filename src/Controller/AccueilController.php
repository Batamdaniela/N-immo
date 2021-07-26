<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="index_accueil")
     */
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/admin", name="index_admin")
     */
    public function index_admin(): Response
    {
        return $this->render('categorie/admin/admin.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/agent", name="index_agent")
     */
    public function index_agent(): Response
    {
        return $this->render('accueil/agent.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/client", name="index_client1")
     */
    public function index_client(): Response
    {
        return $this->render('accueil/client.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

        /**
     * @Route("/client/article", name="client_article")
     */
    public function client_article(): Response
    {
        return $this->render('article/index.html.twig', [
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


    /**
     * @Route("/categorie/client", name="index_client")
     */


    public function categorie_client(): Response
    {
        return $this->render('categorie/client/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
