<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;
use App\Models\ProposalModel AS Proposal;

class SubmitProposalMiddleware
{
	public function handle($request, Closure $next)
    {
    	$validator = Validator::make($request->all(), [
            'budget' => 'required|numeric',
            'estimation_date' => 'required|numeric',
            'summary' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $check = Proposal::check($request->userid, $request->route()[2]['id']);

        if($check !== true){
        	switch ($check) {
	        	case 'invalid_user':
	        		return response()->json(['error' => 'Invalid User'], 401);
	        		break;
	        	case 'invalid_job':
	        		return response()->json(['error' => 'Job not found'], 404);
	        		break;
	        	case 'already_submited':
	        		return response()->json(['error' => 'Alredy submitted'], 401);
	        		break;
	        	case 'max_limit':
	        		return response()->json(['error' => 'Reached maximum limit prososal'], 401);
	        		break;
	        	
	        	default:
	        		return response()->json(['error' => 'Something when wrong'], 500);
	        		break;
	        }
        }

    	return $next($request);
    }
}