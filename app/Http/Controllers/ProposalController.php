<?php

namespace App\Http\Controllers;

use App\Models\ProposalModel AS Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    function create(Request $request, $id)
    {
        $status = Proposal::create($request, $id);

        if($status){
            return response()->json(['id' => $status], 201);
        } else {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    function get(Request $request, $id)
    {
        $proposal = Proposal::get($request->userid, $id);

        if($proposal){
            return response()->json(['data' => $proposal], 200);
        } else {
            return response()->json(['error' => 'Not found'], 404);
        }
    }
    //
}
