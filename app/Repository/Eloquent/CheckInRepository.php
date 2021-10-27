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
        return $this->model
            ->join('users as u', 'u.id', '=', 'check_ins.user_id')
            ->where('check_ins.user_id', user()->id)
            ->orderBy('check_ins.created_at', 'desc')
            ->paginate(10);
    }
}
