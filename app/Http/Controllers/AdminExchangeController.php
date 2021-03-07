<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminExchangeController extends Controller
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
            

            return view('exchange.admin.index', compact('exchanges'));
        }else{
            $exchanges = Exchange::paginate(10);

            return view('exchange.admin.index', compact('exchanges'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exchange.admin.create');
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
            'description' => 'required|string',
            'image' =>'required',
            'website' => 'required',
            'crypto_number' => 'required',
            'assessment' => 'required',
        ]);

        $exchange = new Exchange();
        //Subir la imagen
        // $image = $request->hasFile('image');
        // Si recibimos un objeto imagen tendremos que utilizar el disco para almacenarla
        // Para ello utilizaremos un objeto storage de Laravel
        if($request->hasFile('image')){
            // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
            $image_name =  time() . $request->file('image')->getClientOriginalName();
            // Seleccionamos el disco virtual users, extraemos el fichero de la carpeta temporal
            // donde se almacenó y guardamos la imagen recibida con el nombre generado
            Storage::disk('exchanges')->put($image_name, File::get($request->hasFile('image')));
            $exchange->image_name = $image_name;
        }   
        $exchange->name = $request->name;
        $exchange->description = $request->description;
        $exchange->website = $request->website;
        
        $exchange->assessment = floatval($request->assessment);
        $exchange->crypto_number = intval($request->crypto_number);
        

        $exchange->save();

        return redirect(route('exchange.admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exchange = Exchange::find($id);

        return view('exchange.admin.edit',compact('exchange'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'website' => 'required|url',
            'crypto_number' => 'required',
            'assessment' => 'required'
            
            
        ]);

        

        // $image= $request->file('image');
        // Si recibimos un objeto imagen tendremos que utilizar el disco para almacenarla
        // Para ello utilizaremos un objeto storage de Laravel
        
        $exchange = Exchange::find($exchange->id);
        
        $exchange->name = $request->name;
        $exchange->description = $request->description;
        $exchange->website = $request->website;
        $exchange->crypto_number = $request->crypto_number;
        $exchange->assessment = $request->assessment;
        $exchange->image = $request->name.'.png';
        // if($image){
        //     // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
        //     $image_name =  time() . $image->getClientOriginalName();
        //     // Seleccionamos el disco virtual users, extraemos el fichero de la carpeta temporal
        //     // donde se almacenó y guardamos la imagen recibida con el nombre generado
        //     Storage::disk('exchanges')->put($image_name, File::get($image));
        //     $exchange->image = $image_name;   
        // }
        

        
        
        $exchange->save();
 
        if ($exchange->save()){
            return redirect()->route('exchange.admin.edit', ['exchange' => $exchange->id]);
        }else{
            return redirect()->route('exchange.admin.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exchange = Exchange::find($id);

        if($exchange->delete()){
            return redirect()->route('exchange.admin.index');
        }
    }
}
