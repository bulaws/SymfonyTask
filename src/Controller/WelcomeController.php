<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController extends AbstractController
{
    /**
     * Rendering default page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function welcome() : Response
    {
        return $this->render('welcome/welcome.html.twig');
    }
}
