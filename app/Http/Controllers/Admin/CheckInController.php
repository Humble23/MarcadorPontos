<?php

namespace App\Http\Controllers\Admin;

use App\Models\CheckIn;
use App\Repository\CheckInRepositoryInterface;
use App\Http\Requests\Admin\StoreCheckInRequest;

class CheckInController extends CrudController
{
    protected $instance = CheckIn::class;
    protected $service;

    public function __construct(CheckInRepositoryInterface $CheckInRepository)
    {
        parent::__construct($CheckInRepository);
    }

    public function formRequest()
    {
        return app(StoreCheckInRequest::class);
    }
}
