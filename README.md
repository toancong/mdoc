## About

Wrapper for documo https://docs.documo.com/

## Install

```
composer require toancong/mdoc
```

## Usage

```php
// obtain api key
$apiKey = env('MDOC_API_KEY')

// instance client
$client = new \Bean\Mdoc\Client($apiKey);
```

```php
// Returns your detailed user data.
$response = $client->me->get();
```

```php
// Get all users for account
$response = $client->users->get();
```

```php
// Get some other paths using magic

// change specific version
$response = $client->coverpages->version('')->get();

// other api path
$response = $client->other->path('fax/history')->get();
$response = $client->other->path('fax/history')->getClient()->requestWithAuth('get', 'v1/fax/history');

// other method
$response = $client->other->getClient()->requestWithAuth('post', 'v1/users', [
    'form_params' => [
        'firstName' => 'John',
        'lastName'  => 'Doe',
        'email'     => 'example@mail.com',
        'password'  => 'c.ZQdgm3WAka',
    ]
]);

// Send a fax
$response = $client->other->getClient()->requestWithAuth('post', '/v1/faxes', [
    'multipart' => [
        [
            'name'     => 'faxNumber',
            'contents' => '+12456789000',
        ],
        [
            'name'     => 'attachments',
            'contents' => fopen('/path/to/file', 'r'),
        ],
    ]
]);
```

## License

MIT