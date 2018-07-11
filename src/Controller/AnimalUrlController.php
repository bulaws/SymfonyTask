<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Model\Animal;


class AnimalUrlController extends AbstractController
{
    public function index($name) : Response
    {
        $animal = new Animal();
        $animal = $animal->animalAction($name);
        return $this->render('animal_url/index.html.twig', [
            'animal' => $animal,
        ]);
    }
}
