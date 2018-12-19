<?php

namespace App\Http\Controllers;

use App\TicketType;
use Illuminate\Http\Request;
use Validator;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse('success', TicketType::paginate($this->perPage));
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
            'name' => 'required|string'
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors());
        }

        try{
            $payload = [
                'name' => $request->input('name')
            ];

            $saveTicketType = TicketType::create($payload);
            if($saveTicketType) return $this->successResponse("Ticket Type created");

            return $this->errorResponse("Ticket not created");
        }
        catch(\Exception $exception){
            $this->errorResponse('Operation failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TicketType  $ticketType
     * @return \Illuminate\Http\Response
     */
    public function show(TicketType $ticketType)
    {
        return $this->successResponse('success', TicketType::findOrFail($ticketType->id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TicketType  $ticketType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketType $ticketType)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors());
        }

        try{
            $payload = [
                'name' => $request->input('name')
            ];

            $updateTicketType = TicketType::find($ticketType->id)->update($payload);
            if($updateTicketType) return $this->successResponse("success", $updateTicketType);

            return $this->errorResponse("Ticket type not updated");
        }
        catch(\Exception $exception){
            $this->errorResponse('Operation failed');
        }
    }
}
