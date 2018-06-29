<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{

    /**
     * Rendering default page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function hello()
    {
        return $this->render('hello/hello.html.twig');
    }

}