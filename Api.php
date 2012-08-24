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
    private $key;
    private $path;

    
    public function setKey($key){
	$this->key = $key;
    }

    
    public function getKey(){
	return $this->key;
    }


    public function setPath($path){
	$this->path = $path;
    }


    public function getPath(){
	return $this->path;
    }

}
