<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;



class EventNotification extends Controller
{
    public function notification()
    {
        $currentTime = Carbon::now();
        $clientsToNotif = Event::whereDate('date', $currentTime->addDays(1))->get();

        $startDate = Carbon::createFromFormat('d/m/Y', '20/04/2022');
        $endDate = Carbon::createFromFormat('d/m/Y', '21/04/2022');
  
        $users = Event::select('title', 'sub_title', 'description','date')
                        // ->whereBetween('created_at', [$startDate, $currentTime])
                        ->whereDate('date', $currentTime->addDays(1))
                        ->get();
  
        dd($users);
        
    }
}
