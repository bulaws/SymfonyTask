<?php


namespace App\Service;

use App\Model\Person;

class InfoPerson
{
    public $job;
    public $age;

    /**
     * @return mixed
     */
    public function info($name)
    {
        switch ($name) {
            case "Bob":
                $this->age = 22;
                $this->job = "Manager";
                break;
            case "Petro":
                $this->age = 25;
                $this->job = "Clerk";
                break;
        }

        $this->getJob();
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getJob()
    {
        return $this->job;
    }
}