<?php

return
    [
        'cache_prefix'=>['zipcode'=>'zips:','cacheDB'=>'jsonDB'],
        'pagination'=>['pagenate'=>true, 'perpage'=>10, 'maxGroup'=>10],
        'defaults'=>['zip'=>48341, 'dist'=>2],
        'baseApiUrl'=>App\Helpers\Helper::getBaseApi(),
        'baseStorageUrl'=>App\Helpers\Helper::getBaseStoragePath(),
        'apiToken' => App\Helpers\Helper::getApiToken()
    ];
