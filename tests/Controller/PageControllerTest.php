<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageControllerTest extends WebTestCase
{
    public function testPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/page/home');
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