<?php

namespace App\Models;

use App\Models\BaseModelModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Business;

class Website extends BaseModelModel
{
    //
    protected $table='websites';
    protected $guarded = [];
    protected $with = ['pages'];
    public function Business()
    {
        return $this->belongsTo('App\Models\Business','website_id');
    }

    public function pages()
    {
        return $this->hasMany('App\Models\Page','website_id');
    }

    public function getOwner()
    {

        $business = Business::where('website_id','=',$this->id)->first();
        $owner = $business->getOwner();
        return $owner;
    }

    public function isActive()
    {
      return $this->isActive;
    }

    public function isEnabled()
    {
      return $this->enabled =="enabled";
    }
}
