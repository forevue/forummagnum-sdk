<?php

namespace Forevue\ForumMagnumSdk;

use Exception;

/** @internal */
class GQL
{
    public static function toGQL(array $array): string
    {
        $gql = '';

        foreach ($array as $key => $value) {
            $keyIsNumeric = is_numeric($key);

            if ($keyIsNumeric && is_array($value)) {
                throw new Exception('Can not have a sub-array with a numeric key (ex: 0 { ... })');
            }

            if ($keyIsNumeric || ! is_array($value)) {
                $gql .= $value.' ';

                continue;
            }

            $gql .= $key.' { '.static::toGQL($value).' } ';
        }

        return trim($gql);
    }
}
