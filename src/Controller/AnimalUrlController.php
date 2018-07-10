<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\Animal;


class AnimalUrlController extends AbstractController
{

    public function index() : Response
    {
        $animal = new Animal();
        $animal = $animal->getAnimal();

        return $this->render('animal_url/index.html.twig', [
            'animal' => $animal,
        ]);
    }
}
