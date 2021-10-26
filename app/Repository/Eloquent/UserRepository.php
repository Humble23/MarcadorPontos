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

    private function formatAttributes($attributes)
    {
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['document'] = preg_replace('/\.|\-/', '', $attributes['document']);
        $attributes['zipcode'] = preg_replace('/\-/', '', $attributes['zipcode']);
        $attributes['role'] = strtolower($attributes['role']);

        return $attributes;
    }

    /**
     * Handles model before store.
     *
     * @param Model $resource
     * @param array $attributes
     * @return Model
     */
    public function beforeCreate($attributes)
    {
        $attributes = $this->formatAttributes($attributes);

        return $this->create($attributes, true);
    }

    /**
     * Handles model before ppdate.
     *
     * @param Model $resource
     * @param array $attributes
     * @return Model
     */
    public function beforeUpdate($resource, $attributes)
    {
        $attributes = $this->formatAttributes($attributes);

        return $this->update($resource, $attributes, true);
    }
}
