<?php

namespace App\Repository\Eloquent;

use App\Models\CheckIn;
use App\Repository\CheckInRepositoryInterface;
use App\Repository\Eloquent\Base\BaseRepository;

class CheckInRepository extends BaseRepository implements CheckInRepositoryInterface
{

    /**
     * Type of the resource to manage.
     *
     * @var string
     */
    protected $resourceType = CheckIn::class;

    public function all()
    {
        return $this->model->paginate(10);
    }
}
