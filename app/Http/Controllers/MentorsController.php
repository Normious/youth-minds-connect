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
        $mentors = Mentors::all();
        return view('all-mentors', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mentors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMentorsRequest $request)
    {
        try {
            // Create user with mentor role first
            $user = \App\Models\User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $user->assignRole('mentor');

            // Create mentor profile and link it to the user
            $mentor = Mentors::create([
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'description' => $request->description,
                'user_id' => $user->id
            ]);

            return redirect()->route('all-mentors')->with('success', 'Mentor created successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create mentor: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mentors $mentor)
    {
        return view('mentors.show', compact('mentor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mentors $mentor)
    {
        return view('mentors.edit', compact('mentor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMentorsRequest $request, Mentors $mentor)
    {
        try {
            $mentor->update($request->validated());
            return redirect()->route('mentors.index')->with('success', 'Mentor updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update mentor');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mentors $mentor)
    {
        try {
            $mentor->delete();
            return redirect()->route('mentors.index')->with('success', 'Mentor deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete mentor');
        }
    }
}
