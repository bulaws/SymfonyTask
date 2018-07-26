<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\RepositoryCommitsInfo;

class RepositoryCommitsInfoController extends AbstractController
{

    public function index(string $userName, string $repositoryName)
    {
        $commitsList = new RepositoryCommitsInfo();

        $repositoryCommitsList = $commitsList->getGitApiResponse($userName, $repositoryName);

        if($repositoryCommitsList) {
        return $this->render('repositoryInfo/repositoryInfo.html.twig', [
           'repositoryCommitsInfo' =>  $repositoryCommitsList,
            'repositoryName' => $repositoryName,
        ]);} else{
            return $this->render('repositoryInfo/repositoryInfo.html.twig', [
                'repositoryName' => $repositoryName,
            ]);
        }
    }
}