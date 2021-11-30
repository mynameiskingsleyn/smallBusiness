<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\EtlTrait;

class pStyle extends BaseModelModel
{
    //
    use EtlTrait;
    protected $guarded = [];
    protected $table='p_styles';

    public function __construct()
    {

        $this->etlFields = ['id'=>100,'name'=>100,'view_name'=>100,'description'=>100,'image'=>100];
    }
}
