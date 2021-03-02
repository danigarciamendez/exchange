<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Validator;

class CryptocurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $follows = Auth::user()->cryptocurrencies;
        $cryptos_name = [];

        foreach ($follows as $follow) {
            array_push($cryptos_name,$follow->name);
        }

        if($request){
            $type = $request->get('type');
            $data = $request->get('data');
    
            $cryptos = Cryptocurrency::searchBy($type, $data)->paginate(5);
            

            return view('cryptocurrency.index', compact('cryptos'),compact('cryptos_name') );
        }else{
            $cryptos = Cryptocurrency::paginate(10);

            return view('cryptocurrency.index', compact('cryptos'),compact('cryptos_name'));
        }
        
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
        $crypto = Cryptocurrency::find($id);
        $exchanges = $crypto->exchanges;
        return view('cryptocurrency.show',compact('crypto'),compact('exchanges'));
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

        // Dejo comentado el validate por que no me deja actualizar aunque todo sea string 
        
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'price' => 'required|string',
        //     'symbol' => 'required|string',
        //     'percent_change_1h' => 'required|string',
        //     'percent_change_24h' => 'required|string',
        //     'percent_change_7d' => 'required|string',
        //     'percent_change_30d' => 'required|string',
        //     'volume_24h' => 'required|string',
        //     'market_cap' => 'required|string'
        // ]);

        
        $crypto = Cryptocurrency::find($cryptocurrency->id);
        $crypto->name = $request->name;
        $crypto->symbol = $request->symbol;
        $crypto->price = $request->price;
        $crypto->percent_change_1h = $request->percent_change_1h;
        $crypto->percent_change_24h = $request->percent_change_24h;
        $crypto->percent_change_7d = $request->percent_change_7d;
        $crypto->percent_change_30d = $request->percent_change_30d;
        
        $crypto->save();
 
        if ($crypto->save()){
            
            return redirect()->route('cryptocurrency.admin.edit', ['crypto' => $crypto->id]);
        }else{
            return redirect()->route('cryptocurrency.admin.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cryptocurrency  $cryptocurrency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crypto = Cryptocurrency::find($id);

        if($crypto->delete()){
            return redirect()->route('cryptocurrency.admin.index');
        }
    }


}
