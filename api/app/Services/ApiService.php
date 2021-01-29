<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    protected $http;
    protected $baseUrl;

    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        $this->http = Http::baseUrl($baseUrl);
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion(string $version): ApiService
    {
        $this->baseUrl .= "/{$version}";

        $this->http->baseUrl($this->baseUrl);

        return $this;
    }

    /**
     * @param string $url
     * @param array $params
     * @return \Illuminate\Http\Client\Response
     */
    public function get(string $url, array $params = []): \Illuminate\Http\Client\Response
    {
        return $this->http->get($url, $params);
    }

    /**
     * @param string $url
     * @param array $data
     * @return \Illuminate\Http\Client\Response
     */
    public function post(string $url, array $data = []): \Illuminate\Http\Client\Response
    {
        return $this->http->post($url, $data);
    }

    /**
     * @param string $url
     * @param array $data
     * @return \Illuminate\Http\Client\Response
     */
    public function put(string $url, array $data = []): \Illuminate\Http\Client\Response
    {
        return $this->http->put($url, $data);
    }

    /**
     * @param $url
     * @param $data
     * @return \Illuminate\Http\Client\Response
     */
    public function delete($url, array $data = []): \Illuminate\Http\Client\Response
    {
        return $this->http->delete($url, $data);
    }

}
