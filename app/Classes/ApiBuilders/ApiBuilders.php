<?php

namespace App\Classes\ApiBuilders;
use App\Helpers\Helper;
abstract class ApiBuilders
{
    protected $apiBaseUrl;
    protected $apiToken;
    protected $api;

    /**
     * ApiBuilders constructor.
     * @param $api
     */
    public function __construct($api)
    {
        $this->api = $api;
        list($this->apiBaseUrl, $this->apiToken) = $this->getCredentials();

    }

    /**
     * @param $path
     * @return resource
     * Setup curl object to be used to submit to the api.
     * Returns curl object
     */
    public function initCurl($path,$type='GET')
    {
        $apiUrl = $this->apiBaseUrl . $path;
        $headers = array();

        $headers[] = 'Content-Type: application/json';
        $headers[] = 'x-auth-token:' . $this->apiToken;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_URL, $apiUrl);

        return $ch;
    }

    /**
     * Gets the Path of the specific api
     * @return mixed
     */
    public function getPath()
    {
        return $this->api;
    }

    /**
     * Gets the api Credentials.
     * @return array
     */
    public function getCredentials()
    {
        return [Helper::getBaseApi(),Helper::getApiToken()];
        if(strtolower(env('APP_ENV')) === "production") {
            return [Config('sbws.baseApiURL'), Config('sbws.ApiToken')];
        } else {
            return [Config('sbws.baseApiURL'), Config('sbws.ApiToken')];
        }

    }

    /**
     * @param $param
     * @return mixed
     */
    abstract protected function get($param);
}
