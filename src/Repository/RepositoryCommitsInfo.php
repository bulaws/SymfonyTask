<?php

namespace App\Repository;

use App\Model\CommitInfo;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RepositoryCommitsInfo
{

    public function getGitApiRequest(string $userName,string $repositoryName) : ?array
    {
        $client = new Client();
        $endpoint = 'https://api.github.com/repos';
        $commits = 'commits';

        try {
            $response = $client->request('GET',\sprintf('%s/%s/%s/%s', $endpoint, $userName,
                $repositoryName, $commits));
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                return null;
            }
        }

        $info = (string) $response->getBody();
        $repositoryCommitsInfo = \json_decode($info, true);

        return $this->getCommitsList($repositoryCommitsInfo);
    }

    /**
     * @var array
     * @return array
     */

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