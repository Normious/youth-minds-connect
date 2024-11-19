<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Mentors;
use App\Models\Dialogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //

    public function psychologist(){
        $mentors = Mentors::orderBy('name', 'asc')->get();

        return view('psychologist', compact('mentors'));
    }

    public function StartChat(Mentors $mentor){

        // only if the data is not available yet
        DB::table('chats')->insert([
          'user_id' => Auth::user()->id,
          'mentor_id' => $mentor->id,
          'ative' => 1,
        ]);

        $allchast = Chat::where('user_id', Auth::user()->id)->where('mentor_id', $mentor->id)->first();
        $allchats = Dialogue::where('chat_id', $allchast->id)->get();


        // dd($allchats);
        return view('chat', compact('mentor','allchast', 'allchats'));
    }


}
