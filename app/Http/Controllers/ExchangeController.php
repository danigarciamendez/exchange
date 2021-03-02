<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $exchange = Exchange::get();

        if($request){
            $type = $request->get('type');
            $data = $request->get('data');
    
            $exchanges = Exchange::searchBy($type, $data)->paginate(5);
            

            return view('exchange.index', compact('exchanges'));
        }else{
            $exchanges = Exchange::paginate(10);

            return view('exchange.index', compact('exchanges'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' =>'required|string',
            'website' => 'required|string|max:255',
            'crypto_number' => 'required"',
            'assessment' => 'required"'
        ]);
        //Subir la imagen
        $image= $request->file('image');
        // Si recibimos un objeto imagen tendremos que utilizar el disco para almacenarla
        // Para ello utilizaremos un objeto storage de Laravel
        if($image){
            // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
            $image_name =  time() . $image->getClientOriginalName();
            // Seleccionamos el disco virtual users, extraemos el fichero de la carpeta temporal
            // donde se almacenó y guardamos la imagen recibida con el nombre generado
            Storage::disk('exchanges')->put($image_name, File::get($image));
               
        }   
        $exchange = Exchange::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image_name,
            'vol_market' => $request->vol_market,
        ]);

        event(new Registered($exchange));

        return redirect(view('exchange.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function show(Exchange $exchange)
    {
        $cryptos = $exchange->cryptocurrencies;
        return view('exchange.show',compact('exchange','cryptos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        //
    }
}
