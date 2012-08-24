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


    public function __construct($api){
	$this->api = $api;
	$this->init();
	$this->autorize();
	curl_setopt ($this->connector,CURLOPT_RETURNTRANSFER,true);
	curl_setopt ($this->connector, CURLOPT_POST, 0);
    }

    
    private function init(){
	$this->connector = curl_init($this->api->getPath());
    }
    

    private function autorize(){
	curl_setopt($this->connector, CURLOPT_USERPWD, $this->api->getKey().":ignored");
    }


    public function setMethod($method = 'POST'){
	if ($method === 'POST'){
	    curl_setopt ($this->connector, CURLOPT_POST, 1);
	}
    }


    public function exec(){
	return curl_exec ($this->connector);
    }


    public function getInfo(){
	return curl_getinfo($this->connector);
    }


    public function setData($data){
	if ($data){
	    curl_setopt ($this->connector, CURLOPT_POSTFIELDS, $data);
	}
    }


    public function close(){
	curl_close($this->connector);
    }

}