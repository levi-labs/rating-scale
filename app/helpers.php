
<?php

use App\Models\User;

function getUser($params)
{
    $user = User::where('email', $params)
        ->orWhere('username', $params)
        ->orWhere('id', $params)
        ->first();

    return $user;
}
