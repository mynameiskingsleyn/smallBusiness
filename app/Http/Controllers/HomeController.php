<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pStyle;
use App\Classes\ApiBuilders\PageStylesApiBuilder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageStyleApi = new PageStylesApiBuilder();
        $result = $pageStyleApi->get("","page_styles");
        // $samplePages = pStyle::all();
        // dd($result);
        // dd($samplePages);
        $data = null;
        if($result['success']){
          $data = $result['data'];
        }
        return view('home',['pages'=>$data]);
    }
}
