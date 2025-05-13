<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Models\Mentors;
use App\Models\Dialogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //

    public function psychologist()
    {
        if (!auth()->user() || !auth()->user()->hasRole('mentor')) {
            $mentors = Mentors::orderBy('name', 'asc')->get();
            $users = User::where('role', 'user')->first();
            return view('psychologist', compact('mentors', 'users'));
        }

        $mentors = Mentors::orderBy('name', 'asc')->get();
        $users = User::where('role', 'user')->first();
        $mentor = Mentors::where('user_id', auth()->user()->id)->first();
        
        if (!$mentor) {
            return view('psychologist', compact('mentors', 'users'))->with('error', 'Mentor profile not found.');
        }

        $chats = Chat::where('mentor_id', $mentor->id)
            ->orderBy('created_at', 'desc')
            ->with(['user', 'mentor'])
            ->get();

        return view('psychologist', compact('mentors', 'users', 'chats'));
    }

    public function StartChat(Mentors $mentor)
    {
        if (auth()->user()->hasRole('mentor')) {
            return redirect()->route('mentor.chat', ['chat' => Chat::where('mentor_id', $mentor->id)->first()]);
        }

        $chat = Chat::where('user_id', Auth::user()->id)
            ->where('mentor_id', $mentor->id)
            ->firstOrCreate(
                ['user_id' => Auth::user()->id, 'mentor_id' => $mentor->id],
                ['active' => 1]
            );

        $allchast = $chat;
        $allchats = Dialogue::where('chat_id', $allchast->id)->get();

        return view('chat', compact('mentor', 'allchast', 'allchats'));
    }

    public function mentorChat(Chat $chat)
    {
        if (!auth()->user()->hasRole('mentor') || $chat->mentor_id != auth()->user()->mentor->id) {
            abort(403);
        }

        $mentor = $chat->mentor;
        $allchast = $chat;
        $allchats = Dialogue::where('chat_id', $allchast->id)->get();

        return view('chat', compact('mentor', 'allchast', 'allchats'));
    }
}
