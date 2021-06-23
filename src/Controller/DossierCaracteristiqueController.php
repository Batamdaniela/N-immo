<?php

namespace App\Controller;

use App\Entity\DossierCaracteristique;
use App\Form\DossierCaracteristiqueType;
use App\Repository\DossierCaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dossier/caracteristique")
 */
class DossierCaracteristiqueController extends AbstractController
{
    /**
     * @Route("/", name="dossier_caracteristique_index", methods={"GET"})
     */
    public function index(DossierCaracteristiqueRepository $dossierCaracteristiqueRepository): Response
    {
        return $this->render('dossier_caracteristique/index.html.twig', [
            'dossier_caracteristiques' => $dossierCaracteristiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dossier_caracteristique_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dossierCaracteristique = new DossierCaracteristique();
        $form = $this->createForm(DossierCaracteristiqueType::class, $dossierCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dossierCaracteristique);
            $entityManager->flush();

            return $this->redirectToRoute('dossier_caracteristique_index');
        }

        return $this->render('dossier_caracteristique/new.html.twig', [
            'dossier_caracteristique' => $dossierCaracteristique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossier_caracteristique_show", methods={"GET"})
     */
    public function show(DossierCaracteristique $dossierCaracteristique): Response
    {
        return $this->render('dossier_caracteristique/show.html.twig', [
            'dossier_caracteristique' => $dossierCaracteristique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dossier_caracteristique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DossierCaracteristique $dossierCaracteristique): Response
    {
        $form = $this->createForm(DossierCaracteristiqueType::class, $dossierCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dossier_caracteristique_index');
        }

        return $this->render('dossier_caracteristique/edit.html.twig', [
            'dossier_caracteristique' => $dossierCaracteristique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dossier_caracteristique_delete", methods={"POST"})
     */
    public function delete(Request $request, DossierCaracteristique $dossierCaracteristique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dossierCaracteristique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dossierCaracteristique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dossier_caracteristique_index');
    }
}
