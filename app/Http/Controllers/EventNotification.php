<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;



class EventNotification extends Controller
{
    public function notification()
    {
     
        $events=Event::all();
        $todayDate = Carbon::now()->format('d-m-Y');
        $yesterday = Carbon::yesterday()->format('d-m-Y');
        $users = Event::all()
                        ->where('date', $yesterday)
                        ->first();
  
        dd($users);
        dd($todayDate ,$yesterday);

        
        
        
    }
}
