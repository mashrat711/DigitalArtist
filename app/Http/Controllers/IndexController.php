<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\ArtistDetails;
use App\Models\Event;




class IndexController extends Controller
{
    public function artistList(Artist $artist)
    {
     
        $artistLists=Artist::all();
        $image=ArtistDetails::all();
        $events=Event::where('status',1)->get();
        // dd($events);

        return view('Frontend.index',compact('artistLists','image','events'));
          
        
    }
    public function artistDetailPage(Artist $artist)
    {
     
        $artistLists=Artist::all();
        $image=ArtistDetails::all();
        return view('Frontend.artistDetails',compact('artistLists','image'));
          
        
    }
}
