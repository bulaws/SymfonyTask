<?php


namespace App\Service;

use App\Model\Person;

class InfoPerson
{
    public $job;

    /**
     * @return mixed
     */
    public function info($name) : string
    {
        switch ($name) {
            case "Bob":
                return $this->job = "Manager";
                break;
            case "Petro":
                return $this->job = "Clerk";
                break;
        }
    }

    public function getJob()
    {
        return $this->job;
    }
}