<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Service\RepositoryCommitsInfo;

class RepositoryCommitsInfoController extends AbstractController
{

    public function index(string $userName, string $repositoryName)
    {
        $client = new Client();
        $endpoint = 'https://api.github.com/repos';
        $commits = 'commits';

        try {
            $response = $client->request('GET',\sprintf('%s/%s/%s/%s', $endpoint, $userName,
                $repositoryName, $commits));
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                return $this->render('repositoryInfo/repositoryInfo.html.twig', [
                    'RepositoryName' => $repositoryName
                ]);
            }
        }

        $info = (string) $response->getBody();
        $repositoryCommitsInfo = \json_decode($info, true);

        $repositoryCommitsList = new RepositoryCommitsInfo();

        $repositoryCommitsList->getCommitsList( $repositoryCommitsInfo);

        var_dump($repositoryCommitsList);
        die();
        return $this->render('repositoryInfo/repositoryInfo.html.twig', [
           'repositoryCommitsInfo' =>  $repositoryCommitsList,
            'RepositoryName' => $repositoryName,
        ]);
    }
}