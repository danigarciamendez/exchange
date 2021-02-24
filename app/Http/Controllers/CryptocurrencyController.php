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
        
        $cryptos = Cryptocurrency::paginate(10);

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
            'description' => 'required|string|max:255',
            'price' => 'required|regex:^[1-9][0-9]+|not_in:0"',
            'image' =>'required|string',
            'vol_market' => 'require|regex:^[1-9][0-9]+|not_in:0"'
        ]);
        
        $cryptocurrency = Cryptocurrency::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'vol_market' => $request->vol_market,
        ]);

        event(new Registered($cryptocurrency));

        return redirect(view('cryptocurrency.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cryptos = Cryptocurrency::find($id);

        return view('cryptocurrency.show',[
            'crypto' => $cryptos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cryptocurrency = Cryptocurrency::find($id);

        return view('cryptocurrency.admin.edit',[
            'cryptocurrency' => $cryptocurrency]);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|email|max:255|unique:users',
            'price' => 'required|regex:^[1-9][0-9]+|not_in:0"',
            'image' =>'required|string',
            'vol_market' => 'require|regex:^[1-9][0-9]+|not_in:0"'
        ]);
        $crypto = Cryptocurrency::find($cryptocurrency->id);
 
        if (!$crypto) {
            return response()->json([
                'success' => false,
                'message' => 'Plate not found'
            ], 400);

        }

        $updated = $crypto->fill($request->all())->save();
 
        if ($updated)
            return redirect(view('cryptocurrency.admin.index'));
        else
            return response()->json([
                'success' => false,
                'message' => 'Post can not be updated'
            ], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cryptocurrency $cryptocurrency)
    {
        $crypto = Cryptocurrency::find($cryptocurrency->id);

        if($crypto->delete()){
            return view();
        }
    }
}
