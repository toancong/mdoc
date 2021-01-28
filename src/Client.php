<?php

namespace Bean\Mdoc;

use Bean\Mdoc\Resource\Other;
use GuzzleHttp\Client as GuzzleHttpClient;

class Client
{
    const BASE_URL = "https://api.documo.com/";

    private $api_key;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    public function requestWithAuth(string $method, string $path, $options = [])
    {
        $client = new GuzzleHttpClient([
            'base_uri' => SELF::BASE_URL,
            'headers'  => ['Authorization' => 'Basic ' . $this->api_key]
        ]);
        $res = $client->request($method, $path, $options);
        return json_decode($res->getBody(), true);
    }

    public function __get($name)
    {
        $class =  '\\Bean\Mdoc\\Resource\\' . ucfirst($name);
        if (class_exists($class)) {
            return new $class($this);
        } else {
            return new Other($this, $name);
        }
    }
}
