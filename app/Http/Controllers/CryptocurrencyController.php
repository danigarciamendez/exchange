<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CryptocurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cryptos = Cryptocurrency::get();

        return view('cryptocurrency.index',[
            'cryptos' => $cryptos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cryptocurrency.create');
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
            'description' => 'required|string|email|max:255|unique:users',
            'price' => 'required|numeric',
            'image' =>'required|string',
            'vol_market' => 'require|numeric'
        ]);
        
        $cryptocurrency = Cryptocurrency::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'vol_market' => $request->vol_market,
        ]);

        event(new Registered($$cryptocurrency));

        return redirect(view('cryptocurrency.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function show(Cryptocurrency $cryptocurrency)
    {
        $cryptos = Cryptocurrency::find($cryptocurrency->id)->get();

        return view('cryptocurrency.index',[
            'cryptos' => $cryptos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function edit(Cryptocurrency $cryptocurrency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cryptocurrency $cryptocurrency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cryptocurrency $cryptocurrency)
    {
        //
    }
}
