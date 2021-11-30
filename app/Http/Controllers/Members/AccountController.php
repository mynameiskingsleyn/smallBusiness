<?php

namespace App\Http\Controllers\Members;

use Illuminate\Http\Request;
use App\Models\bType;
use App\Http\Controllers\Controller;
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

        return view('members.account.index',compact('user','businesses','btypes'));
    }
}
