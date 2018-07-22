<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\PageContent;
use App\Repository\PageContentRepository;


class PageController extends AbstractController
{
    public function index($pageName) : Response
    {
        $manager = $this->getDoctrine()->getManager();

        /** @var PageContentRepository $repository */
        $repository =  $manager->getRepository(PageContent::class);
        $contents = $repository->findOneBySomeField($pageName);
        return $this->render('page/index.html.twig', [
             'contents' => $contents,
        ]);
    }
}