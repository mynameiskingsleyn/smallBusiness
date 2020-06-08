<?php

//namespace App\Http\Controllers;
namespace App\Http\Controllers\Api\v1;

//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\MainController;
use App\Models\Business;
use App\User;
use App\Models\Website;

use Illuminate\Http\Request;

class BusinessController extends MainController
{
    //
    public function create(Request $request)
    {

        //\Log::debug($request->all());
        try{
            $posted = $request->all();
            $posted['website_id'] = 0;
            $sName = strtolower($posted['name']);
            $slugName = explode(' ',$sName);
            $slugName = implode('_',$slugName);
            $user = User::findOrFail($posted['user_id']);
           // \Log::debug($user);
            $busId = Business::insertGetId($posted);
            //\Log::debug("business id is $busId");
            $website = [];
            $website['name'] = $posted['name'];
            $website['landing_id'] = 0;
            $website['contact_email'] = '';
            $website['active'] = true;
            $website['status'] =  'disabled'; //opposite = enabled
            $website['slug'] = $slugName.'_sbws';
            $website['business_id'] = 0;
            if($user){
                $website['contact_email'] = $user->email; // enable if active user
                $website['slug'] = $slugName.'_sbws_'.$user->id;
            }
            if($busId){
                $business = Business::findOrFail($busId);
                if($business){
                    $website['business_id'] = $busId;
                    $website['slug'].=$busId;
                }
            }
            // create website
            $webId = Website::insertGetId($website);
            if($webId && $busId){
                $webUp = ['business_id' => $busId];
                $busUp =['website_id'=>$webId];
                $website = Website::findOrFail($webId);
                $website->update($webUp);
                $business->update($busUp);
            }

            $businesses = $user->Businesses ?? [];
            return response(['businesses'=>$businesses,200]);
        }catch(\Exception $e){
            return response(['message'=>$e->getMessage()],500);
        }



    }

    public function update(Request $request)
    {
        $posted = $request->all();
        //\Log::debug($posted);
        $busId = $posted['id'];

        if($busId){ //process
            $business = Business::where('id','=',$busId)->first();
            $currentUser = auth()->user();
            \Log::debug($currentUser);

            $data = ['name'=>$posted['name'],
                     'Address1'=>$posted['Address1'],
                     'Address2'=>$posted['Address2'],
                     'city'=>$posted['city'],
                     'state'=>$posted['state'],
                     'country'=>$posted['country'],
                     'zipcode'=>$posted['zipcode'],
                     'b_type_id'=>$posted['b_type_id']
            ];
            $owner = $business->getOwner();
            $website = Website::where('business_id','=',$busId)->first();
            $sName = strtolower($posted['name']);
            $slugName = explode(' ',$sName);
            $slugName = implode('_',$slugName);
            $slug = $slugName.'_sbws_'.$owner->id.$busId; // set up slug
            $webUp = ['slug'=>$slug];
            $website->update($webUp);
            $business->update($data);
            $business = $business->fresh();
            //$businesses = $owner->Businesses ?? [];
            return response(['business'=>$business,200]);



        }
        return response(['message'=>'missing Business ID'],500);

    }
}
