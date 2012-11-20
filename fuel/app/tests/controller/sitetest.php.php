<?php
 
require_once 'goutte.phar';
use Goutte\Client;
 
class SiteTest extends TestCase
{
 
    protected $client;
 
    public function setUp()
    {
        parent::setUp();
        $this->client = new Client();
    }
 
}