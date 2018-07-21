<?php

namespace App\Model;


class Animal
{
   private static $animalList = [
       'Dog' => [
           8 => 'walk',
           22 => 'sleep',
       ],
       'Cat' => [
           8 => 'sleep',
           20 => 'eat',
           22 => 'sleep',
       ],
   ];

    public function animalAction($animalName)
    {
        $time = localtime(time(), 'tm_hour')['tm_hour'];
        if(!empty(self::$animalList[$animalName])) {
            foreach (self::$animalList[$animalName] as $hour => $action) {
                if($time > $hour) {
                    return $action;
                }
            }
            return array_pop(self::$animalList[$animalName]);
        }
    }
}