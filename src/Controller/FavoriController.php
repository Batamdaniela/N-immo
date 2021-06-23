<?php

namespace App\Controller;

use App\Entity\Favori;
use App\Form\FavoriType;
use App\Repository\FavoriRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/favori")
 */
class FavoriController extends AbstractController
{
    /**
     * @Route("/", name="favori_index", methods={"GET"})
     */
    public function index(FavoriRepository $favoriRepository): Response
    {
        return $this->render('favori/index.html.twig', [
            'favoris' => $favoriRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="favori_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $favori = new Favori();
        $form = $this->createForm(FavoriType::class, $favori);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($favori);
            $entityManager->flush();

            return $this->redirectToRoute('favori_index');
        }

        return $this->render('favori/new.html.twig', [
            'favori' => $favori,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="favori_show", methods={"GET"})
     */
    public function show(Favori $favori): Response
    {
        return $this->render('favori/show.html.twig', [
            'favori' => $favori,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="favori_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Favori $favori): Response
    {
        $form = $this->createForm(FavoriType::class, $favori);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('favori_index');
        }

        return $this->render('favori/edit.html.twig', [
            'favori' => $favori,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="favori_delete", methods={"POST"})
     */
    public function delete(Request $request, Favori $favori): Response
    {
        if ($this->isCsrfTokenValid('delete'.$favori->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($favori);
            $entityManager->flush();
        }

        return $this->redirectToRoute('favori_index');
    }
}
