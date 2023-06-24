<?php

use Forevue\ForumMagnumSdk\Client;

it('can create an EA Forum client', function () {
    $client = Client::eaForum();

    expect(
        (string) $client->getHttpClient()->getConfig('base_uri')
    )->toBe('https://forum.effectivealtruism.org/graphql');
});

it('can create a LessWrong client', function () {
    $client = Client::lessWrong();

    expect(
        (string) $client->getHttpClient()->getConfig('base_uri')
    )->toBe('https://www.lesswrong.com/graphql');
});

it('can get a post', function () {
    $response = Client::eaForum()->getPost('r4Lkz4tK7CmPoXQfK', ['_id']);

    expect($response)->toBe([
        '_id' => 'r4Lkz4tK7CmPoXQfK',
    ]);
});
