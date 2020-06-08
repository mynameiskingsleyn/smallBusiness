<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bType;

class AccountController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {

        $user = auth()->user();
        $btypes = bType::all();
        //dd($btypes);
        $businesses = $user->Businesses ?? [];
        //dd($businesses);
        if(!$businesses){
            $businesses = collect($businesses);
        }

        //dd($businesses);
        //dd($user);

        return view('account.index',compact('user','businesses','btypes'));
    }
}
