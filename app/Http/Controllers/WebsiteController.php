<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\pStyle;

class WebsiteController extends MainController
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function show()
    {

    }

    public function edit(Website $id)
    {
        $pagestyles = pStyle::all();

        if(Gate::allows('update-item',$id)){
            $website = $id;
            return view('account.website',compact('website','pagestyles'));

        }else{
            return view('errors.403');
        }
    }
}
