<?php
/**
 * @group Controller
 * @group Welcome
 */
class Test_Controller_Welcome extends SiteTest
{
 
    public function test_hello()
    {
        $crawler = $this->client->request('GET', Uri::create('welcome'));
        $this->assertEquals('Hello', $crawler->filter('title')->text());
    }
 /*
    public function test_hello_alice()
    {
        $crawler = $this->client->request('GET', Uri::create('hello/:name', array('name' => 'alice')));
        $this->assertEquals('Hello, alice', $crawler->filter('title')->text());

    }
    */ 
}