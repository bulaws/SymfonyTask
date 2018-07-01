<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends AbstractController
{

    /**
     * Rendering default page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function hello() : Response
    {
        return $this->render('hello/hello.html.twig');
    }

}