<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\ETLHelper;

use Illuminate\Support\Facades\Gate;

//use App\Helpers\UserHelper;

class MainController extends Controller
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

//    public function pagenationCheck(Request $request)
//    {
//        $pagenate = $this->userHelper->pagenate;
//        $isApi = $this->userHelper->isApi($request);
//        if($pagenate) {
//            //dd('api');
//            $hasPagenate = $this->userHelper->requestHasPagination($request);
//            if (!$hasPagenate) {// add pagenation
//                //$this->userHelper->addParams($request);
//                //dd($request->all());
//                $url = $this->userHelper->rebuildQueryWithPagination($request);
//                //dd($url);
//                return $url;
//            }
//        }
//
//
//        return null;
//    }
//
//    public function apiCheck(Request $request)
//    {
//        $isApi = $this->userHelper->isApi($request);
//        if(!$isApi){
//            $url = $request->fullUrl();
//            $newUrl = $this->userHelper->addApiToUrl($url);
//            return $newUrl;
//        }
//        return null;
//    }
}
