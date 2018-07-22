<?php

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testContent()
    {
        $client = static::createClient();

        $crawler = $client->request("GET", "/home/main");
        self::assertEquals(200, $client->getResponse()->getStatusCode());
        self::assertContains(
            "main",
            $client->getResponse()->getContent()
        );
        self::assertGreaterThan(
            0,
            $crawler->filter('p:contains("(044)")')->count()
        );
    }
}