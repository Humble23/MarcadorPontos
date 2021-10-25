<?php

namespace App\Repository;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function all(): Collection;

    public function create(array $attributes): Model;
}
