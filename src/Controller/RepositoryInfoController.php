<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Model\RepositoryInfo;

class RepositoryInfoController extends AbstractController
{
    /*public function __construct(string $userName, string $repositoryName)
    {

    }*/

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
        $repositoryInfo = \json_decode($info, true);

        $modelRepositoryInfo = new RepositoryInfo();
        $commitsInfo = $modelRepositoryInfo->getCommitsInfo($repositoryInfo);

        return $this->render('repositoryInfo/repositoryInfo.html.twig', [
           'repositoryInfo' =>  $commitsInfo
        ]);
    }
}