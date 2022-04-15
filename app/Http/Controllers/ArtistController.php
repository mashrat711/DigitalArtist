<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;

class ArtistController extends Controller
{
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
            $artistData = $StoreArtistRequest->all();
            if($StoreArtistRequest->has('image')){
                $ArtistImage = $StoreArtistRequest->name.'-'.time().'_'.$StoreArtistRequest->image->getClientOriginalName();
                $StoreArtistRequest->image->move('dashboard/pictures/artists', $ArtistImage);
                $artistData['image'] = $ArtistImage;
            }else{
                $artistData['image'] = null;
            }
            Product::create($artistData);
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
        return view('dashboard.artists.show', compact('artist'));
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
            $artistData = $UpdateArtistRequest->all();

            if($UpdateArtistRequest->hasFile('image')){
                $artistImage = $UpdateArtistRequest->name.'-'.time().'_'.$UpdateArtistRequest->image->getClientOriginalName();
                if(!empty($artist->image) && file_exists(public_path("dashboard/pictures/products/$artist->image"))){
                    unlink(public_path("dashboard/pictures/products/$product->image"));
                };
                $UpdateArtistRequest->image->move('dashboard/pictures/products', $artistImage);
                $artistData['image'] = $artistImage;
            }
            $artist->update($artistData);
            return redirect()->route('artists.show', $product->id)->with('message', 'Data has been updated successfully');
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
            if(!empty($artist->image) && file_exists(public_path("dashboard/pictures/artists/$artist->image"))){
                unlink(public_path("dashboard/pictures/artists/$artist->image"));
            };
            $artist->delete();
            return redirect()->route('artists.index')->with('message', 'Data has been deleted successfully');
        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}