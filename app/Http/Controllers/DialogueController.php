<?php

namespace App\Http\Controllers;

use App\Models\Dialogue;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDialogueRequest;
use App\Http\Requests\UpdateDialogueRequest;
use App\Events\ChatMessageSent; // Add this

class DialogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDialogueRequest $request)
    {
        // The validateRequest() method already ensures 'chat_id', 'message', 'user_id' exist.
        $dialogue = Dialogue::create($this->validateRequest());

        // Broadcast the new message event
        broadcast(new ChatMessageSent($dialogue))->toOthers();

        // Alert::toast('Successfully added an organization ', 'success'); // Original line

        return redirect()->back(); // Current behavior, might be changed if using AJAX fully
    }

    private function validateRequest()
    {
        return request()->validate([
            'chat_id' => 'required',
            'message' => 'required',
            'user_id' => 'required',

        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Dialogue $dialogue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dialogue $dialogue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDialogueRequest $request, Dialogue $dialogue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dialogue $dialogue)
    {
        //
    }
}
