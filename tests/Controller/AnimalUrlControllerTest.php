<?php

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AnimalUrlControllerTest extends WebTestCase
{
    public function testRout()
    {
        $client = static::createClient();

        $client->request('GET', '/animal/Cat');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testContent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/animal/Dog');
        self::assertGreaterThan(
            0,
            $crawler->filter('p:contains("Dog")')->count()
        );
    }
}