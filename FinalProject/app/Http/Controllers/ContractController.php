<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'proposal_id' => 'required|exists:proposals,id',
        ]);

        if (!$validate->fails()) {
            $proposal = Proposal::findOrFail($request->proposal_id);

            $request->merge([
                'proposal_id' => $proposal->id,
                'project_id' => $proposal->project_id,
                'user_id' => $proposal->user_id,
                'cost' => $proposal->price,

            ]);
            $proposal->project()->update([
                'status' => 'progress',
            ]);

            if ($proposal->contract->exists){
                return response()->json(['message' => 'The Freelancer Has Been Contracted'], Response::HTTP_BAD_REQUEST);

            }else{
                $contract = new Contract();

                $isSaved =$contract->create($request->all());
                return response()->json(['message' => $isSaved ? 'Success Contract ' : ' failed!'],
                    $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
                );
            }


        } else {
            return response()->json(['message' => $validate->messages()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);
        if ($proposal->contract->exists){
            return response()->json(['message' => 'You cannot delete, you contract with this freelancer'], Response::HTTP_BAD_REQUEST);

        }else{
            $isDeleted = $proposal->delete();
            return response()->json(
                ['message' => $isDeleted ? 'Success Deleted ' : 'Delete failed!'],
                $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        }
    }
}
