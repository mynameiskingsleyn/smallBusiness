<?php

namespace App\Models;
use App\Models\Image;


class Page extends BaseModelModel
{
    //
    protected $table='pages';
    protected $guarded = [];

    public function Images()
    {
        return $this->hasMany(Image::class,'page_id');
    }

    public function childPages()
    {
       return $this->hasMany(Page::class,'parent_id');
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
