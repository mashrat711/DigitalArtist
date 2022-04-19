<?php

namespace App\Http\Controllers;

use App\Models\ArtistDetails;
use App\Models\Artist;

use App\Http\Requests\StoreArtistDetailsRequest;
use App\Http\Requests\UpdateArtistDetailsRequest;
use Illuminate\Support\Facades\DB;


class ArtistDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ArtistDetails::with('artist')->get();
        dd($data);
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
        return view('dashboard.artistDetails.create', compact('formType', 'artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtistDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistDetailsRequest $request)
    {

        
        // dd($request->all());
        // $model->created_at->format('H:i:s');
        // dd($model);

        
        try{
            $artistData = array();
            // $ArtistImage=array();
            // if($request->has('image')){
            //         $ArtistImage = $request->artist_id.'-'.time().'_'.$request->image->getClientOriginalName();
            //         $request->image->move('dashboard/pictures/projects', $ArtistImage);
            //         $artistData['image'] = $ArtistImage;
            //     }else{
            //         $artistData['image'] = null;
            //     }
            $date=$request->date;

            foreach($request->title as  $key => $data){
                
                ArtistDetails::create([
                    'artist_id'=>$request->artist_id,
                    'title'=>$request->title[$key],
                    'sub_title'=>$request->sub_title[$key],
                    'description'=>$request->description[$key],
                    'date'=>$request->date,

                    ]);
                
        
            }
            

            return redirect()->route('artists.index');
        }catch(QueryException $e){
            return redirect()->route('artists.create')->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArtistDetails  $artistDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ArtistDetails $artistDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArtistDetails  $artistDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ArtistDetails $artistDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistDetailsRequest  $request
     * @param  \App\Models\ArtistDetails  $artistDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistDetailsRequest $request, ArtistDetails $artistDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArtistDetails  $artistDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArtistDetails $artistDetails)
    {
        //
    }
}
