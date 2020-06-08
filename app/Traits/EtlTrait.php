<?php

namespace App\Traits;

trait EtlTrait
{
    public function getEtlFields()
    {
        return $this->etlFields;
    }

    public function updateEtlFields($fieldsArray)
    {
        $this->etlFields = $fieldsArray;
    }
}