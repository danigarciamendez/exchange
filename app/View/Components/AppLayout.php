<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;
use App\Models\Cryptocurrency;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        
        
        return view('layouts.app');
    }
}
