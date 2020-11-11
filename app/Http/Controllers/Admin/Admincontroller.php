<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pluscoach;
use App\User;
use DB;
use Redirect;

class AdminController extends Controller
{
    public function index()
    {
    	$users = User::all();

        return view('admin.users.index')
            ->with('users', $users);
    }
    
    public function admins()
    {
     $pluscoaches = User::where('is_pluscoach', 1)->get()
     ;

     return view('admin.users.create')
        ->with('pluscoaches', $pluscoaches);
    }

}
