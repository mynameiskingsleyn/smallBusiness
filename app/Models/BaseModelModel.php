<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Helpers\ZipCodeHelper;

use App\Models\User;

class BaseModelModel extends Model
{
//
    public function getTable()
    {
        return $this->table;
    }

}