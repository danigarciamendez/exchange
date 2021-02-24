<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;

class AdminCryptocurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cryptos = Cryptocurrency::get();

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
}
