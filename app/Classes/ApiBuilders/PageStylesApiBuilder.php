<?php

namespace App\Classes\ApiBuilders;

class PageStylesApiBuilder extends ApiBuilders
{

    /**
     * HoursApiBuilder constructor.
     */
    public function __construct()
    {
        $api = '/api/page_styles';
        parent::__construct($api);
    }

    /**
     * @param $params
     * @return array|mixed
     */
    public function get($params="")
    {
        $ch = $this->initCurl($this->getPath());
        if($params){
          $ch = $this->initCurl($this->getPath()."?{$params}");
        }

        $paramsArray = explode('=',$params);
        $result = [];

        $http_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        $data = null;
        //dd("hear now stukk");
        //dd($http_response);
        if($http_code == 200 && $http_response != null){ //SUCCESS
             $decoded = json_decode($http_response);

             $result['success']=true;
            //dd($decoded);
             // if(isset($paramsArray[1])){
             //     $id = $paramsArray[1];
             //     $data = $decoded->results->{$id};
             // }

             $result['data'] = $decoded->page_styles;
        }elseif($http_code == 401 || $http_code == 500){
           $result['success']=false;
           $result['data'] = null;
        }else{ //Other error, so display API message to user
            $result['success']=false;
            $result['data'] = null;
        }

        return $result;
    }

}
