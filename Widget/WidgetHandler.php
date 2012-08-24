<?php

/**
 * This file is part of the PHPDucksboardApi package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Moises Gallego <moisesgallego@gmail.com>
 */

namespace MGP\PHPDucksboardApi\Widget;

use MGP\PHPDucksboardApi\Widget\Widget,
    MGP\PHPDucksboardApi\Connection\Connector;

class WidgetHandler extends Widget{


    public function push(){
	foreach ($this->data as $widgetId => $widgetData){
	    $this->api->setPath('PUSH', array($widgetId));
	    $this->callApi('POST', json_encode($widgetData));
	}
    }


    public function callApi($method,  $inputData = null){ 
	$connector = $this->createConnector($this->api);
	$connector->setMethod($method);
	$this->setResponse($this->sendData($connector, $inputData));
	$connector->close();
	unset($connector);
    } 


   private function sendData($connector, $data){
	$connector->setData($data);
	return $connector->exec();
    }


    public function getLastValues($widgetId, $count = 3){
	$this->api->setPath('PULL', array($widgetId, "/last/?count={$count}"));
	$this->callApi('GET');
    }


    public function findBySeconds($widgetId, $seconds){
	$this->api->setPath('PULL', array($widgetId, "/since?seconds={$seconds}"));
	$this->callApi('GET');
    }
        

    public function findByTimespan($widgetId, $timespan, $timezone){
	$this->api->setPath('PULL', array($widgetId, "/timespan?timespan={$timespan}&timezone={$timezone}"));
	$this->callApi('GET');
    }


    public function createConnector(){
	return new Connector($this->api);
    }

}