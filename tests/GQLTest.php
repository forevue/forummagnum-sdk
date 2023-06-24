<?php

use Forevue\ForumMagnumSdk\GQL;

it('can convert an array to GQL', function () {
    $gql = GQL::toGQL([
        '_id',
        'contents' => ['html', 'editedAt'],
    ]);

    expect($gql)->toBe('_id contents { html editedAt }');
});

it('thros an error when converting a sub-array without a string key', function () {
    GQL::toGQL([
        ['html', 'editedAt'],
    ]);
})->throws(Exception::class, 'Can not have a sub-array with a numeric key (ex: 0 { ... })');
