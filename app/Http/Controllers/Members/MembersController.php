<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {

        $user = auth()->user();
        // $btypes = bType::all();
        // //dd($btypes);
        // $businesses = $user->Businesses ?? [];
        // //dd($businesses);
        // if(!$businesses){
        //     $businesses = collect($businesses);
        // }

        //dd($businesses);
        //dd($user);

        return view('members.home',compact('user'));
    }
}
