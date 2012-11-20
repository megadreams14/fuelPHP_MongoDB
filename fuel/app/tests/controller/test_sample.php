<?php

/**
 * Description of test_sample
 *
 * @author n00982
 * 
 * @group Controller
 */
class Test_Controller_Sample extends TestCase
{
    
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function test_index(){
        $response = Request::forge('sample/index')->execute()->response();
        $render = $response->send();
    }
}


