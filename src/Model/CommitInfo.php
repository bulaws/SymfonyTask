<?php

namespace App\Model;


class CommitInfo
{
    private $author;
    private $message;
    private $shortSha;

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getShortSha()
    {
        return $this->shortSha;
    }

    /**
     * @param mixed $shortSha
     */
    public function setShortSha($shortSha): void
    {
        $this->shortSha = \substr($shortSha, 0, 7);
    }

}