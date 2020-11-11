<?php

namespace App\Http\Controllers;

use App\Mood;
use Auth;
use Illuminate\Http\Request;

class MoodController extends Controller
{
    public function store(Request $request){

        $validatedData = $request->validate([
            'user_id' => 'required',
            'mood' => 'required',
            'reason' => 'required',
        ]);

        $mood = new Mood([
            'user_id' => Auth::id(),
            'mood' => $request->get('mood'),
            'reason' => $request->get('reason'),
	    ]);

        if($mood->save()){
            return redirect(route('home'))->with('success', 'Mood has been added');
        }
        else{
            return redirect(route('home'))->with('success', 'Error occured, please try again');
        }
    }
}
