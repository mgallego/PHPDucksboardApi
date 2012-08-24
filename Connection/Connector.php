<?php

/**
 * This file is part of the PHPDucksboardApi package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Moises Gallego <moisesgallego@gmail.com>
 */

namespace MGP\PHPDucksboardApi\Connection;

class Connector
{
    private $connector;
    private $api;


    public function __construct($api, $method = 'POST'){
	$this->api = $api;
	$this->method = $method;
	$this->init();
	$this->autorize();
	$this->setMethod();
	curl_setopt ($this->connector,CURLOPT_RETURNTRANSFER,true);
    }

    
    private function init(){
	$this->connector = curl_init($this->api->getPath());
    }
    

    private function autorize(){
	curl_setopt($this->connector, CURLOPT_USERPWD, $this->api->getKey().":ignored");
    }


    private function setMethod(){
	$methodKey = 1;

	if ($this->method === 'GET'){
	    $methodKey = 0;
	}
	curl_setopt ($this->connector, CURLOPT_POST, $methodKey);
    }


    public function exec(){
	return curl_exec ($this->connector);
    }


    public function setData($data){
	curl_setopt ($this->connector, CURLOPT_POSTFIELDS, $data);
    }


    public function close(){
	curl_close($this->connector);
    }

}