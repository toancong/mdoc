<?php

namespace Bean\Mdoc\Resource;

/**
 * User Resource
 *
 * @see https://docs.documo.com/?php#users
 */
class Users extends Base
{
    public function __construct($client)
    {
        parent::__construct($client, 'users');
    }
}
