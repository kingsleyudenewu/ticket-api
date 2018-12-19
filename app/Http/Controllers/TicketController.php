<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse('success', Ticket::paginate($this->perPage));
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
            'code' => 'required|string',
            'ticket_type_id' => 'required|integer'
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors());
        }

        try{
            $payload = [
                'code' => $request->input('code'),
                'ticket_type_id' => $request->input('ticket_type_id')
            ];

            $saveTicketType = Ticket::create($payload);
            if($saveTicketType){
                $saveTicketType->ticket_types()->attach($request->input('ticket_type_id'));
                return $this->successResponse("success");
            }

            return $this->errorResponse("Ticket not created");
        }
        catch(\Exception $exception){
            $this->errorResponse('Operation failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return $this->successResponse('success', Ticket::findOrFail($ticket->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validate = Validator::make($request->all(), [
            'code' => 'required|string',
            'ticket_type_id' => 'required|integer'
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors());
        }

        try{
            $payload = [
                'code' => $request->input('code'),
                'ticket_type_id' => $request->input('ticket_type_id')
            ];

            $saveTicketType = Ticket::find($ticket->id)->update($payload);
            if($saveTicketType){
                $ticket->ticket_types()->sync($request->input('ticket_type_id'));

                return $this->successResponse("success");

            }

            return $this->errorResponse("Ticket not updated");
        }
        catch(\Exception $exception){
            $this->errorResponse('Operation failed');
        }
    }
}
