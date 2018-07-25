<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class RepositoryInfoController extends AbstractController
{
    public function index(string $userName, string $repositoryName)
    {
        $client = new Client();
        $endpoint = 'https://github.com';
        try {
            $response = $client->request('GET', \sprintf('%s/%s.json', $endpoint, $userName,
                $repositoryName));
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                return $this->render('repositoryInfo/repositoryInfo.html.twig', [
                    'RepositoryName' => $repositoryName
                ]);
            }
        }
        var_dump($response);
        die();
        $json = (string) $response->getBody();
        $repositoryInfo = \json_decode($json, true);
        var_dump($repositoryInfo);

        return $this->render('repositoryInfo/repositoryInfo.html.twig', [

        ]);
    }
}