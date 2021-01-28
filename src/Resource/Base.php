<?php

namespace Bean\Mdoc\Resource;

use Bean\Mdoc\Client;

abstract class Base
{
    protected $version;
    protected $path;

    /** @var Client */
    protected $client;

    public function __construct($client, $path, $version = 'v1')
    {
        $this->client = $client;
        $this->path = $path;
        $this->version = $version;
    }

    public function getPath()
    {
        return $this->version . '/' . $this->path;
    }

    public function version($version)
    {
        $this->version = $version;
        return $this;
    }

    public function path($path)
    {
        $this->path = $path;
        return $this;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function get($params = [])
    {
        return $this->client->requestWithAuth('get', $this->getPath(), [
            'query' => $params,
        ]);
    }
}
