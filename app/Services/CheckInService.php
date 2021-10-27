<?php

namespace App\Services;

use App\Models\User;
use App\Models\CheckIn;

class CheckInService
{
    public function checkIn(User $user)
    {
        $checkIn = new CheckIn();
        $checkIn->user_id = $user->id;
        $checkIn->check_in_date = now();
        $checkIn->save();

        return true;
    }
}
