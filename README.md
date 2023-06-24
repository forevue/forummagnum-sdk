# forummagnum-sdk

[![Tests](https://github.com/forevue/forummagnum-sdk/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/forevue/forummagnum-sdk/actions/workflows/tests.yml)
[![Formats](https://github.com/forevue/forummagnum-sdk/actions/workflows/formats.yml/badge.svg?branch=main)](https://github.com/forevue/forummagnum-sdk/actions/workflows/formats.yml)
[![Version](https://poser.pugx.org/forevue/forummagnum-sdk/version)](//packagist.org/packages/forevue/forummagnum-sdk)
[![Total Downloads](https://poser.pugx.org/forevue/forummagnum-sdk/downloads)](//packagist.org/packages/forevue/forummagnum-sdk)
[![License](https://poser.pugx.org/forevue/forummagnum-sdk/license)](//packagist.org/packages/forevue/forummagnum-sdk)

## Installation

> Requires [PHP 8.2+](https://php.net/releases)

You can install the package via composer:

```bash
composer require forevue/forummagnum-sdk
```

## Usage

### Getting started

```php
$client = \Forevue\ForumMagnumSdk\Client::eaForum();
// Or,
$client = \Forevue\ForumMagnumSdk\Client::lessWrong();
```

> This SDK doesn't include any caching mechanism, but **cache requests**, especially resource heavy ones. **Be a nice
human.**

### Get a post

```php
$post = $client->getPost('post-id', [
    '_id',
    'contents' => [
       'html',
    ]
]);
```

> If you ever need more / want to contribute, a better way to do this would be to create small objects with the
> properties you want and hydrate them.

## Testing

```bash
composer test
```

**forummagnum-sdk** was created by **[Félix Dorn](https://forevue.fr)** under the *
*[MIT license](https://opensource.org/licenses/MIT)**.
