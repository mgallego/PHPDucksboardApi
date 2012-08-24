<?php

namespace MGP\PHPDucksboardApi\Tests\Connection;

use MGP\PHPDucksboardApi\Api;

class ApiTest extends \PHPUnit_Framework_TestCase
{

    public function testSetPath(){
	$api = new Api();
	$parameters = array('1', '/2', '/3');
	$api->setPath('PUSH', $parameters);
	$this->assertEquals(Api::PUSH_PATH.'1/2/3', $api->getPath());
	$api->setPath('PULL', $parameters);
	$this->assertEquals(Api::PULL_PATH.'1/2/3', $api->getPath());
    }
 
}