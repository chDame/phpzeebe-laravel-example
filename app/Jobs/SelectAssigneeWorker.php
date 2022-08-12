<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Camundity\PhpZeebe\ZeebeWorker;
use App\Services\ZeebeService;


class SelectAssigneeWorker extends ZeebeWorker implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	
	public function __construct() {
		$this->setType("selectAssignee");
	}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ZeebeService $zeebeService) {
		$this->setClient($zeebeService->getClient());
        $this->work();
		usleep(100000);
		dispatch(new SelectAssigneeWorker());
    }
	
	
	public function executeTask($activatedJob){
		$variables = $this->getVariables($activatedJob);
		$variables["assignee1"] = "toto";
		$this->complete($activatedJob, $variables);
	}
}
?>