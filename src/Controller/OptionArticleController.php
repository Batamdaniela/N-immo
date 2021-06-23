<?php

namespace App\Controller;

use App\Entity\OptionArticle;
use App\Form\OptionArticleType;
use App\Repository\OptionArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/option/article")
 */
class OptionArticleController extends AbstractController
{
    /**
     * @Route("/", name="option_article_index", methods={"GET"})
     */
    public function index(OptionArticleRepository $optionArticleRepository): Response
    {
        return $this->render('option_article/index.html.twig', [
            'option_articles' => $optionArticleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="option_article_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $optionArticle = new OptionArticle();
        $form = $this->createForm(OptionArticleType::class, $optionArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($optionArticle);
            $entityManager->flush();

            return $this->redirectToRoute('option_article_index');
        }

        return $this->render('option_article/new.html.twig', [
            'option_article' => $optionArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="option_article_show", methods={"GET"})
     */
    public function show(OptionArticle $optionArticle): Response
    {
        return $this->render('option_article/show.html.twig', [
            'option_article' => $optionArticle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="option_article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, OptionArticle $optionArticle): Response
    {
        $form = $this->createForm(OptionArticleType::class, $optionArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('option_article_index');
        }

        return $this->render('option_article/edit.html.twig', [
            'option_article' => $optionArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="option_article_delete", methods={"POST"})
     */
    public function delete(Request $request, OptionArticle $optionArticle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$optionArticle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($optionArticle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('option_article_index');
    }
}
