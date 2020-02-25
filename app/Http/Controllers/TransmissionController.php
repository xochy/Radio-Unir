<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransmissionRequest;
use App\Http\Requests\UpdateTransmissionRequest;
use App\Station;
use App\Transmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransmissionController extends Controller
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
        
        $transmissions = Transmission::paginate(10);
        return view('transmissions.index', compact('transmissions'));
    }  

    public function showMyTransmissions(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        
        $transmissions = Transmission::where('user_id', auth()->user()->id)->paginate(10);
        return view('transmissions.showMyTransmissions', compact('transmissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all();
        return view('transmissions.create', compact('stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransmissionRequest $request)
    {
        $transmission = new Transmission();
        $transmission->name  = $request->name;
        $transmission->theme = $request->theme;
        $transmission->url   = $request->url;
        $transmission->date  = $request->date;
        $transmission->hour  = $request->hour;
        $transmission->slug  = 'transmision'.time();

        $transmission->station_id = $request->input('listaEstaciones');
        $transmission->user_id = auth()->user()->id;
        
        $transmission->save();

        return redirect()->route('showMyTransmissions')
            ->with('datos', 'Transmisión de radio almacenada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transmission  $transmission
     * @return \Illuminate\Http\Response
     */
    public function show(Transmission $transmission)
    {
        return view('transmissions.show', compact('transmission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transmission  $transmission
     * @return \Illuminate\Http\Response
     */
    public function edit(Transmission $transmission)
    {
        $stations = Station::all();
        return view('transmissions.edit', compact('transmission', 'stations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transmission  $transmission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransmissionRequest $request, Transmission $transmission)
    {
        $transmission->fill($request->all());
        $transmission->station_id = $request->input('listaEstaciones');
        $transmission->save();

        return redirect()->route('showMyTransmissions')
            ->with('status', 'Tu transmisión de radio ha sido actualizada correctamente');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transmission  $transmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transmission $transmission)
    {
        $transmission->delete();        
        $transmissions = Transmission::where('user_id', auth()->user()->id)->paginate(10);
        
        return redirect()->route('showMyTransmissions')
            ->with('status', 'Tu transmisión de radio ha sido eliminada correctamente');;
    }

    public function confirmAction(Transmission $transmission)
    {
        return view('transmissions.confirmAction', compact('transmission'));
    }
}