<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testHome()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/home');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
        self::assertContains(
            "home",
            $client->getResponse()->getContent()
        );
        self::assertGreaterThan(
            0,
            $crawler->filter('p:contains("Kyiv")')->count()
        );
    }
}