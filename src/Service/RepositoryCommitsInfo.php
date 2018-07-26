<?php

namespace App\Service;

use App\Model\CommitInfo;

class RepositoryCommitsInfo
{

    public function getCommitsList(array $repositoryCommitsInfo) : array
    {
        $repositoryCommitsList = [];

        foreach ($repositoryCommitsInfo as $commitInfo) {

            $commit = new CommitInfo();
            $commit->setAuthor($commitInfo['commit']['author']['name']);
            $commit->setMessage($commitInfo['commit']['message']);
            $commit->setShortSha($commitInfo['sha']);

            $repositoryCommitsList []= $commit;
        }
        return $repositoryCommitsList;
    }

}