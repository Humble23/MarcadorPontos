<?php

namespace App\Repository\Eloquent\Base;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Repository\Eloquent\Base\EloquentRepositoryInterface;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Type of the resource to manage.
     *
     * @var string
     */
    protected $resourceType;

    /**
     * Eloquent instance for helper methods.
     *
     * @var Model
     */
    protected $resourceInstance;

    /**
     * BaseRepository constructor.
     *
     * @param Model|Role $model
     */
    public function __construct()
    {
        $this->model = app($this->resourceType);
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
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
        return $this->create($attributes, true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes, $exec = false): Model
    {
        if (!$exec) {
            return $this->beforeCreate($attributes);
        }

        return DB::transaction(function () use ($attributes) {
            $attributes = $this->createAttributes($attributes);

            /** @var Model $resource */
            $resource = $this->build($attributes, true);
            $resource->save();

            return $this->afterStore($resource, $attributes);
        });
    }

    /**
     * Handles create action attributes.
     *
     * @param array $attributes
     * @return array
     */
    public function createAttributes($attributes)
    {
        return $this->filterAttributes($attributes);
    }

    /**
     * Filter attributes
     *
     * @param array $attributes
     * @return array
     */
    public function filterAttributes($attributes)
    {
        return $attributes;
    }

    /**
     * Build a new object without saving.
     *
     * @param array $attributes
     * @param bool $force
     * @return Model
     */
    public function build($attributes, $force = false)
    {
        return $this->fill(
            $this->getInstance(),
            $attributes,
            $force
        );
    }

    /**
     * Get resource instance.
     *
     * @return Model
     */
    public function getInstance()
    {
        if (is_null($this->resourceInstance)) {
            $this->resourceInstance = new $this->resourceType();
        }

        return $this->resourceInstance;
    }

    /**
     * Handles model after store.
     *
     * @param Model $resource
     * @param array $attributes
     * @return Model
     */
    public function afterStore($resource, $attributes)
    {
        return $this->afterSave($resource, $attributes);
    }

    /**
     * Handles model after save.
     *
     * @param Model $resource
     * @param array $attributes
     * @return Model
     */
    public function afterSave($resource, $attributes)
    {
        return $resource;
    }


    public function all()
    {
        return $this->model->all();
    }

    /**
     * Fills data to the resource.
     *
     * @param Model $resource
     * @param array $attributes
     * @param bool $force
     * @return Model
     */
    public function fill($resource, $attributes)
    {
        $fillable_columns = Schema::getColumnListing($resource->getTable());
        $attributes = collect($attributes)->only($fillable_columns)->toArray();
        $resource->fill($attributes);

        return $resource;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Model $resource
     * @return Model
     */
    public function delete($resource)
    {
        return DB::transaction(function () use ($resource) {
            $resource = $this->beforeDelete($resource);

            $resource->delete();

            return $this->afterDelete($resource);
        });
    }

    /**
     * Handles model before delete.
     *
     * @param Model $resource
     * @return Model
     */
    public function beforeDelete($resource)
    {
        return $resource;
    }

    /**
     * Handles model after delete.
     *
     * @param Model $resource
     * @return Model
     */
    public function afterDelete($resource)
    {
        return $resource;
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
        return $this->update($resource, $attributes, true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Model $resource
     * @param array $attributes
     * @return Model
     */
    public function update($resource, $attributes, $exec = false)
    {
        if (!$exec) {
            return $this->beforeUpdate($resource, $attributes);
        }

        return DB::transaction(function () use ($resource, $attributes) {
            $attributes = $this->updateAttributes($attributes);

            /** @var Model $resource */
            $resource = $this->fill($resource, $attributes, true);
            $resource->save();

            return $this->afterUpdate($resource, $attributes);
        });
    }

    /**
     * Handles update action attributes.
     *
     * @param array $attributes
     * @return array
     */
    public function updateAttributes($attributes)
    {
        return $this->filterAttributes($attributes);
    }

    /**
     * Handles model after update.
     *
     * @param Model $resource
     * @param array $attributes
     * @return Model
     */
    public function afterUpdate($resource, $attributes)
    {
        return $this->afterSave($resource, $attributes);
    }
}
