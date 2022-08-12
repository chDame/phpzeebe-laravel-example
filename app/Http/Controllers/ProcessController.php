<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ZeebeService;

class ProcessController extends Controller {
	
	protected ZeebeService $zeebeService;
	
	public function __construct(ZeebeService $zeebeService) 
	{
		$this->zeebeService = $zeebeService;
	}
	
	public function startProcess(Request $request){
	
		$rsp = $this->zeebeService->deploy("camunda-process.bpmn");

		$rsp2 = $this->zeebeService->runInstance(["var1"=>"something"]);

        return response()->json(['status'=>200,'instanceKey'=>$rsp2]);
    }
}
