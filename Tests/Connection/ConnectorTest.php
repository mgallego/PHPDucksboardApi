<?php

namespace MGP\PHPDucksboardApi\Tests\Connection;

use MGP\PHPDucksboardApi\Api,
    MGP\PHPDucksboardApi\Connection\Connector;

class ConnectorTest extends \PHPUnit_Framework_TestCase
{

    public function testExec(){
	$api = new Api();
	$api->setAbsolutePath('http://php.net');

	$connector = new Connector($api);
	$connector->setMethod('GET');


	$this->assertContains('html', $connector->exec());
    }

}