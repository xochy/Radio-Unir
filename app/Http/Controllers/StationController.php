<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //?$request->user()->authorizeRoles(['admin', 'user']);
        //?$request->user()->authorizeRoles('admin');
        
        $stations = Station::all();
        return view('stations.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStationRequest $request)
    {
        $station = new Station();
        $station->name = $request->name;
        $station->description = $request->description;
        $station->slug = 'estacion'.time();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $station->image = $name;
        }
        else
        {
            return $request;
            $station->image = '';   
        }

        $station->save();

        return redirect()->route('stations.index')->
        with('datos', 'Estación de radio almacenada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        return view('stations.show', compact('station'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        return view('stations.edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStationRequest $request, Station $station)
    {
        $station->fill($request->except('image'));

        if($request->hasFile('image'))
        {
            if(\File::exists(public_path() . "/images/$station->image")){

                \File::delete(public_path() . "/images/$station->image");
            }else
            {
                dd('File does not exists.');
            }
            
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $station->image = $name;
        }
        
        $station->save();

        return redirect()->route('stations.show', compact('station'))
            ->with('status', 'Estación de radio actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        if(\File::exists(public_path() . "/images/$station->image")){

            \File::delete(public_path() . "/images/$station->image");
        }else
        {
            dd('File does not exists.');
        }
        
        $station->delete();
        return redirect()->route('stations.index')
            ->with('datos', 'Estación de radio eliminada correctamente');;
    }
}