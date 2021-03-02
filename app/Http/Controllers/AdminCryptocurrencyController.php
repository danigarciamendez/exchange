<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminCryptocurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cryptos = Cryptocurrency::paginate(10);

        return view('cryptocurrency.admin.index',[
            'cryptos' => $cryptos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cryptocurrency.admin.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function edit(Cryptocurrency $cryptocurrency)
    {   
        // $crypto = Cryptocurrency::find($cryptocurrency);
        return view('cryptocurrency.admin.edit',['cryptocurrency' => $cryptocurrency]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|not_in:0"',
            'percent_change_1h' => 'required|numeric',
            'percent_change_24h' => 'required|numeric',
            'percent_change_7d' => 'required|numeric',
            'percent_change_30d' => 'required|numeric',
            'volume_24h' => 'required|numeric|not_in:0',
            'market_cap' => 'required|numeric|not_in:0'
            
            
        ]);

    //     $image= $request->file('image');
    //     // Si recibimos un objeto imagen tendremos que utilizar el disco para almacenarla
    //     // Para ello utilizaremos un objeto storage de Laravel
        
    //     $crypto = Cryptocurrency::find($id);
    //     if($image){
    //         // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
    //         $image_name =  time() . $image->getClientOriginalName();
    //         // Seleccionamos el disco virtual users, extraemos el fichero de la carpeta temporal
    //         // donde se almacenó y guardamos la imagen recibida con el nombre generado
    //         Storage::disk('users')->put($image_name, File::get($image));
    //         $crypto->image = $image_name;   
    //     }

    //     $crypto->name = $request->name;
    //     $crypto->price = $request->price;
    //     $crypto->percent_change_1h = $request->percent_change_1h;
    //     $crypto->percent_change_24h = $request->percent_change_24h;
    //     $crypto->percent_change_7d = $request->percent_change_7d;
    //     $crypto->percent_change_30d = $request->percent_change_30d;
        
    //     $crypto->save();
 
    //     if ($crypto->save()){
    //         $errors = [
    //             'type' =>'sucsess',
    //             'msg' =>'Cryptocurrency update sucsses'
    //         ];
    //         return redirect()->route('cryptocurrency.admin.edit', ['id' => $crypto->id, 'errors' =>$errors]);
    //     }else{
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Post can not be updated'
    //         ], 500);
    //     }
    }
}
