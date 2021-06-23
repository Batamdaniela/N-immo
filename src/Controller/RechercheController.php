<?php

namespace App\Controller;

use App\Entity\Recherche;
use App\Form\RechercheType;
use App\Repository\RechercheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/recherche")
 */
class RechercheController extends AbstractController
{
    /**
     * @Route("/", name="recherche_index", methods={"GET"})
     */
    public function index(RechercheRepository $rechercheRepository): Response
    {
        return $this->render('recherche/index.html.twig', [
            'recherches' => $rechercheRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="recherche_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $recherche = new Recherche();
        $form = $this->createForm(RechercheType::class, $recherche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recherche);
            $entityManager->flush();

            return $this->redirectToRoute('recherche_index');
        }

        return $this->render('recherche/new.html.twig', [
            'recherche' => $recherche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="recherche_show", methods={"GET"})
     */
    public function show(Recherche $recherche): Response
    {
        return $this->render('recherche/show.html.twig', [
            'recherche' => $recherche,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="recherche_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Recherche $recherche): Response
    {
        $form = $this->createForm(RechercheType::class, $recherche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recherche_index');
        }

        return $this->render('recherche/edit.html.twig', [
            'recherche' => $recherche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="recherche_delete", methods={"POST"})
     */
    public function delete(Request $request, Recherche $recherche): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recherche->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recherche);
            $entityManager->flush();
        }

        return $this->redirectToRoute('recherche_index');
    }
}
