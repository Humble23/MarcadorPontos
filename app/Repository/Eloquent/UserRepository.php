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

    public function all()
    {
        return $this->model
            ->select('users.*', 'manager.name as manager_name')
            ->leftJoin('users as manager', 'manager.id', 'users.manager_id')
            ->paginate(10);
    }

    private function formatAttributes($attributes)
    {
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['document'] = preg_replace('/\.|\-/', '', $attributes['document']);
        $attributes['zipcode'] = preg_replace('/\-/', '', $attributes['zipcode']);
        $attributes['role'] = slugfy($attributes['role']);
        $attributes['manager_id'] = user()->id;

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
