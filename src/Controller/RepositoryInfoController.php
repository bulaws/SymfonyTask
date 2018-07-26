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
        $endpoint = 'https://api.github.com/repos';
        $commits = 'commits';

        try {
            $response = $client->request('GET', \sprintf('%s/%s.json', $endpoint, $userName,
                $repositoryName, $commits));
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

        return $this->render('repositoryInfo/repositoryInfo.html.twig');
    }
}