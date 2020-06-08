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
}
