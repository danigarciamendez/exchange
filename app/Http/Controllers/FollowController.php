<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use App\Models\Exchange;
use App\Models\Follow;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user_id = Auth::user()->id;
        $request->validate([
            'crypto_id' => 'required|string|max:255',
            
            
        ]);

        
        $follow = Follow::create([
            'name' => $request->name,
            'description' => $request->description,
            
        ]);

        event(new Registered($follow));

        return redirect(view('cryptocurrency.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function edit(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {   
        
        $user_id = Auth::user()->id;
        $follow = Follow::where('cryptocurrency_id',$id)->where('user_id',$user_id);



        $follow->delete();
        return redirect()->route('cryptocurrency.index');
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function new_follow(Request $request)
    {
        
        $user_id = Auth::user()->id;

       

        $request->validate([
            'cryptocurrency_id' => 'required',
            
        ]);
        $follow = Follow::create([
            'user_id' => $user_id,
            'cryptocurrency_id' => $request->cryptocurrency_id  
        ]);
        
        event(new Registered($follow));
        
        return redirect()->action([CryptocurrencyController::class, 'index']);
    }
}
