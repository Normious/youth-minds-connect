<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMentorsRequest;
use App\Http\Requests\UpdateMentorsRequest;
use App\Models\Mentors;

class MentorsController extends Controller
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
    public function store(StoreMentorsRequest $request)
    {
        try {
            $mentor = Mentors::create($request->validated());
            return response()->json(['success' => true, 'mentor' => $mentor]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to create mentor'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mentors $mentors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mentors $mentors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMentorsRequest $request, Mentors $mentors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mentors $mentors)
    {
        //
    }
}
