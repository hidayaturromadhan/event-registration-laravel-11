<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Peserta;

class UserController extends Controller
{
    public function index()
    {
  
        $events = Event::all();

        return view('user.index', compact('events'));
    }
}
