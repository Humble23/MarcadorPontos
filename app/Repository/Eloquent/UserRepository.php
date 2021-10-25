<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use App\Repository\Eloquent\Base\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
     * Type of the resource to manage.
     *
     * @var string
     */
    protected $resourceType = User::class;
}
