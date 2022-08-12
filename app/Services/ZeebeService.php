<?php

namespace App\Services;

use Camundity\PhpZeebe\ZeebeClient;

class ZeebeService {
	
	protected $zeebeClient = null;
	
	public function getClient() {
		if ($this->zeebeClient==null) {
			$this->zeebeClient = new ZeebeClient("XXX");
			$this->zeebeClient->saasAuth("XXX", "XXX");
		}
		return $this->zeebeClient;
	}
	
	public function deploy($processName) {
		return $this->getClient()->deployProcess(storage_path($processName));
	}
	
	public function runInstance($variables) {
		$rsp = $this->getClient()->runInstance("camunda-process2","latest", $variables);
		return $rsp->getProcessInstanceKey();
	}
	
	public function publishMessage($messageName, $correlationKey, $variables) {
		return $this->getClient()->publishMessage($messageName, $correlationKey, $variables);
	}
}

?>