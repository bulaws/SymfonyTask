<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\PageContent;
use App\Repository\PageContentRepository;


class HomeController extends AbstractController
{
    public function index() : Response
    {
        $manager = $this->getDoctrine()->getManager();

        /** @var PageContentRepository $repository */
        $repository =  $manager->getRepository(PageContent::class);
        $contents = $repository->findByPageName(PageContent::PAGE_HOME);
        return $this->render('home/home.html.twig', [
             'contents' => $contents,
        ]);
    }
}