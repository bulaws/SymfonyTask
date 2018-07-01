<?php

namespace App\Controller;

use App\Model\Person;
use App\Service\InfoPerson;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GuestController extends AbstractController
{
    /**
     * Rendering guest page
     * @return Response
     */
    public function guest() : Response
    {
        $person = new Person('Bob','Lobster');
        $firstName = $person->firstName;
        $info = new InfoPerson();
        $infoPerson = $info->info($firstName);
        var_dump($infoPerson);
        return $this->render('guest/guest.html.twig', [
             'info' => $infoPerson
        ]);
    }
}