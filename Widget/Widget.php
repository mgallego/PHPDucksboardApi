<?php

/**
 * This file is part of the PHPDucksboardApi package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Moises Gallego <moisesgallego@gmail.com>
 */

namespace MGP\PHPDucksboardApi\Widget;

abstract class Widget{

    protected $data;
    protected $response;


    public function setResponse($response){
	$this->response[] = $response;
    }


    public function getResponse(){
	return $this->response;
    }

    
    public function clearResponse(){
	unset($this->response);
    }


    public function setData($data){
	$this->data = $data;
    }


    public function appendData($data){
	$this->data +=  $data;
    }


    public function getData(){
	return $this->data;
    }


    public function setApi($api){
	$this->api = $api;
    }

}