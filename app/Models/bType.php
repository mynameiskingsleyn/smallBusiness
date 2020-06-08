<?php

namespace App\Models;

use App\Models\BaseModelModel;
use Illuminate\Database\Eloquent\Model;
use App\Traits\EtlTrait;


class bType extends BaseModelModel
{
    //
    use EtlTrait;
    protected $table ='b_types';
    public function __construct()
    {

        $this->etlFields = ['id'=>100,'name'=>100,'description'=>100];
    }
}
