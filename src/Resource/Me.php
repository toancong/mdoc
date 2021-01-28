<?php

namespace Bean\Mdoc\Resource;

/**
 * Me Resource
 *
 * @see https://docs.documo.com/?php#view-my-user
 */
class Me extends Base
{
    public function __construct($client)
    {
        parent::__construct($client, 'me');
    }
}
