<?php

/**
 * This file is part of the PHPDucksboardApi package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Moises Gallego <moisesgallego@gmail.com>
 */

namespace MGP\PHPDucksboardApi;

class Api
{

    const PUSH_PATH = 'https://push.ducksboard.com/values/';
    const PULL_PATH = 'https://pull.ducksboard.com/values/';
    private $key;
    private $path;

    
    public function setKey($key){
	$this->key = $key;
    }

    
    public function getKey(){
	return $this->key;
    }


    public function getPath(){
	return $this->path;
    }


    public function setPath($method = 'PUSH', $parameters){
	$this->path =  $this->getClassConstant($method.'_PATH');
	foreach ($parameters as $parameter){
	    $this->path .=  $parameter;
	}
    }

    
    private function getClassConstant($constantName){
	return constant('self::'.$constantName);
    }


    public function setAbsolutePath($absolutePath){
	$this->path = $absolutePath;
    }

}
