<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\ArtistDetails;

use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;

class ArtistController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'show'
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artist::all();
        // dd($data);
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
        return view('dashboard.artists.create', compact('formType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistRequest $request)
    {
        try{
            $artistData = $request->all();
            // dd($artistData);
            if($request->has('image')){
                $ArtistImage = $request->name.'-'.time().'_'.$request->image->getClientOriginalName();
                $request->image->move('dashboard/pictures/artist', $ArtistImage);
                $artistData['image'] = $ArtistImage;
            }else{
                $artistData['image'] = null;
            }
            // dd($artistData);
            Artist::create($artistData);
            return redirect()->route('artists.index');
        }catch(QueryException $e){
            return redirect()->route('artists.create')->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        // $artist->created_at->diffForHumans()->get();
        // dd($artist);
        $artist=Artist::with('artistDetails')->where('id',$artist->id)->first();
        // dd($artist);
        
        return view('Frontend.ArtistDetails', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        $formType = "edit";
        return view('dashboard.artists.create', compact('formType', 'artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistRequest  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        try{
            $artistData = $request->all();

            if($request->hasFile('image')){
                $artistImage = $request->name.'-'.time().'_'.$request->image->getClientOriginalName();
                if(!empty($artist->image) && file_exists(public_path("dashboard/pictures/artist/$artist->image"))){
                    unlink(public_path("dashboard/pictures/artist/$artist->image"));
                };
                $request->image->move('dashboard/pictures/artist', $artistImage);
                $artistData['image'] = $artistImage;
            }
            $artist->update($artistData);
            return redirect()->route('artists.index', $artist->id)->with('message', 'Data has been updated successfully');
        }catch(QueryException $e){
            return redirect()->route('artists.edit')->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        try{
            if(!empty($artist->image) && file_exists(public_path("dashboard/pictures/artist/$artist->image"))){
                unlink(public_path("dashboard/pictures/artist/$artist->image"));
            };
            $artist->delete();
            return redirect()->route('artists.index')->with('message', 'Data has been deleted successfully');
        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
