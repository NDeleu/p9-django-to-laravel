<?php

namespace App\Helpers;

class CustomHelpers
{
    public static function modelType($value)
    {
        return class_basename($value);
    }

    public static function userPronounChoice($user, $contextUser)
    {
        return $user == $contextUser ? 'vous' : $user->username;
    }
}
