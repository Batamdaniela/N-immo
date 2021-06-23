<?php

namespace App\Controller;

use App\Entity\DossierCategorie;
use App\Form\DossierCategorieType;
use App\Repository\DossierCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dossier/categorie")
 */
class DossierCategorieController extends AbstractController
{
    /**
     * @Route("/", name="dossier_categorie_index", methods={"GET"})
     */
    public function index(DossierCategorieRepository $dossierCategorieRepository): Response
    {
        return $this->render('dossier_categorie/index.html.twig', [
            'dossier_categories' => $dossierCategorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dossier_categorie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dossierCategorie = new DossierCategorie();
        $form = $this->createForm(DossierCategorieType::class, $dossierCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dossierCategorie);
            $entityManager->flush();

            return $this->redirectToRoute('dossier_categorie_index');
        }

        return $this->render('dossier_categorie/new.html.twig', [
            'dossier_categorie' => $dossierCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossier_categorie_show", methods={"GET"})
     */
    public function show(DossierCategorie $dossierCategorie): Response
    {
        return $this->render('dossier_categorie/show.html.twig', [
            'dossier_categorie' => $dossierCategorie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dossier_categorie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DossierCategorie $dossierCategorie): Response
    {
        $form = $this->createForm(DossierCategorieType::class, $dossierCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dossier_categorie_index');
        }

        return $this->render('dossier_categorie/edit.html.twig', [
            'dossier_categorie' => $dossierCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossier_categorie_delete", methods={"POST"})
     */
    public function delete(Request $request, DossierCategorie $dossierCategorie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dossierCategorie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dossierCategorie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dossier_categorie_index');
    }
}
