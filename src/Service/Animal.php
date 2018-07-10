<?php


namespace App\Service;

use Symfony\Component\HttpFoundation\Request;

class Animal
{

    public function getAnimal(Request $request)
    {
        $animalName = $request->query->get('name','Dog');
        return $animalName;
    }

}