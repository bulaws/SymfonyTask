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
        $countRepositoryCommitsList = $commitsList->getCountRepositoryCommit($repositoryCommitsList);

        if($repositoryCommitsList) {
        return $this->render('repositoryInfo/repositoryInfo.html.twig', [
           'repositoryCommitsInfo' =>  $repositoryCommitsList,
            'repositoryName' => $repositoryName,
            'countRepositoryCommitsList' => $countRepositoryCommitsList
        ]);} else{
            return $this->render('repositoryInfo/repositoryInfo.html.twig', [
                'repositoryName' => $repositoryName,
            ]);
        }

    }
}