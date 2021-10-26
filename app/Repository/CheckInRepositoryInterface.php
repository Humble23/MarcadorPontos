<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface CheckInRepositoryInterface
{
    public function all();

    public function create(array $attributes): Model;
}
