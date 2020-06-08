<?php

namespace App\Models;

use App\Models\BaseModelModel;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Business extends BaseModelModel
{
    //
    protected $table='businesses';
    protected $guarded = [];
    protected $with = ['website'];
    public function website()
    {
        return $this->hasOne('App\Models\Website','business_id');
    }

    public function getOwner()
    {

        return User::where('id','=',$this->user_id)->first();

    }

    public function getId()
    {
        return $this->id;
    }

}
