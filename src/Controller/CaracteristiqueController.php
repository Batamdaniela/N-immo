<?php

namespace App\Controller;

use App\Entity\Caracteristique;
use App\Form\CaracteristiqueType;
use App\Repository\CaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/caracteristique")
 */
class CaracteristiqueController extends AbstractController
{
    /**
     * @Route("/", name="caracteristique_index", methods={"GET"})
     */
    public function index(CaracteristiqueRepository $caracteristiqueRepository): Response
    {
        return $this->render('caracteristique/index.html.twig', [
            'caracteristiques' => $caracteristiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="caracteristique_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $caracteristique = new Caracteristique();
        $form = $this->createForm(CaracteristiqueType::class, $caracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($caracteristique);
            $entityManager->flush();

            return $this->redirectToRoute('caracteristique_index');
        }

        return $this->render('caracteristique/new.html.twig', [
            'caracteristique' => $caracteristique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="caracteristique_show", methods={"GET"})
     */
    public function show(Caracteristique $caracteristique): Response
    {
        return $this->render('caracteristique/show.html.twig', [
            'caracteristique' => $caracteristique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="caracteristique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Caracteristique $caracteristique): Response
    {
        $form = $this->createForm(CaracteristiqueType::class, $caracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('caracteristique_index');
        }

        return $this->render('caracteristique/edit.html.twig', [
            'caracteristique' => $caracteristique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="caracteristique_delete", methods={"POST"})
     */
    public function delete(Request $request, Caracteristique $caracteristique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$caracteristique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($caracteristique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('caracteristique_index');
    }
}
