<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Peserta;
use Illuminate\Http\Request;

class AdminController extends Controller
{
 
    public function index()
    {
        $totalEvent = Event::count();
        $totalPeserta = Peserta::count();

        return view('pages.admin.dashboard', compact('totalEvent', 'totalPeserta'));
    }
}
