<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::all();
        return view('dashboard.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = "create";
        return view('dashboard.events.create', compact('formType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        try{
            $data = $request->all();
            Event::create($data);
            return redirect()->route('events.create')->with('message', 'Data has been inserted successfully');
        }catch(QueryException $e){
            return redirect()->route('events.create')->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
       $todayDate = Carbon::now()->format('d-m-Y');
        
        // dd($event->date);
        if($event->date==$todayDate)
            {
                $event=Event::with('artWorks')->first();
                return view('Frontend.events', compact('event'));

            }
            else
               return view('Frontend.message', compact('event'));

        
        // $yesterday = Carbon::yesterday()->format('d-m-Y');
        // $users = Event::with('artWorks')
        //                 ->where('date', $todayDate)
        //                 ->first();
        // $event=Event::with('artWorks')->first();
        // dd($event);
        
        // return view('Frontend.events', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $formType = "edit";
        
        return view('dashboard.events.create', compact( 'formType','event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        try{
            $data = $request->all();
            $event->update($data);
            return redirect()->route('events.index')->with('message', 'Data has been updated successfully');
        }catch(QueryException $e){
            return redirect()->route('events.create')->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        try{
            $event->delete();
            return redirect()->route('events.create')->with('message', 'Data has been deleted successfully');
        }catch(QueryException $e){
            return redirect()->route('events.create')->withErrors($e->getMessage());
        }
    }


    function status_update($id)
{
	//get product status with the help of product ID
	$event = DB::table('events')
				->select('status')
				->where('id','=',$id)
				->first();
                // dd($event);

	//Check user status
	if($event->status == '1'){
		$status = '0';
	}else{
		$status = '1';
	}

	//update product status
	$values = array('status' => $status );
    // dd($values);
	DB::table('events')->where('id',$id)->update($values);

	session()->flash('msg','Product status has been updated successfully.');
	return redirect()->route('events.index');
}
}
