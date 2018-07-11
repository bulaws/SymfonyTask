<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Model\Person;
use App\Service\InfoPerson;
use Throwable;

class GuestControllerTest extends WebTestCase
{
    public function testGuest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/guest');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
        self::assertContains(
            'Info page',
            $client->getResponse()->getContent()
        );
        self::assertGreaterThan(
            0,
            $crawler->filter('a:contains("Welcome")')->count()
        );
    }

    public function testPost()
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/guest/kolia');
        self::assertEquals(404, $client->getResponse()->getStatusCode());
    }
}