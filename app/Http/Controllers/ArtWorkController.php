<?php

namespace App\Http\Controllers;

use App\Models\ArtWork;

use App\Models\Event;
use App\Models\Artist;


use App\Http\Requests\StoreArtWorkRequest;
use App\Http\Requests\UpdateArtWorkRequest;

class ArtWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ArtWork::all();
        dd($data);
        return view('dashboard.artists.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = "create";
        $artists = Artist::orderBy('name')->pluck('name', 'id');
        $events = Event::orderBy('title')->pluck('title', 'id');

        return view('dashboard.artWorks.create', compact('formType', 'events','artists'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtWorkRequest $request)
    {
        try{
            $artworks = $request->all();
            // dd($artworks);
            if($request->has('image')){
                $ArtistImage = $request->name.'-'.time().'_'.$request->image->getClientOriginalName();
                $request->image->move('dashboard/pictures/artworks', $ArtistImage);
                $artworks['image'] = $ArtistImage;
            }else{
                $artworks['image'] = null;
            }
            ArtWork::create($artworks);
            return redirect()->route('artWorks.create');
        }catch(QueryException $e){
            return redirect()->route('artWorks.create')->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArtWork  $artWork
     * @return \Illuminate\Http\Response
     */
    public function show(ArtWork $artWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArtWork  $artWork
     * @return \Illuminate\Http\Response
     */
    public function edit(ArtWork $artWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtWorkRequest  $request
     * @param  \App\Models\ArtWork  $artWork
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtWorkRequest $request, ArtWork $artWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArtWork  $artWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArtWork $artWork)
    {
        //
    }
}
