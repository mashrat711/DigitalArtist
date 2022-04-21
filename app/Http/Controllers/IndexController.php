<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\ArtistDetails;



class IndexController extends Controller
{
    public function artistList(Artist $artist)
    {
     
        $artistLists=Artist::all();
        $image=ArtistDetails::all();
        return view('Frontend.index',compact('artistLists','image'));
          
        
    }
    public function artistDetailPage(Artist $artist)
    {
     
        $artistLists=Artist::all();
        $image=ArtistDetails::all();
        return view('Frontend.artistDetails',compact('artistLists','image'));
          
        
    }
}
