<?php

namespace App\Http\Controllers\Admin;

use App\Models\CheckIn;
use Illuminate\Http\Request;
use App\Services\CheckInService;
use App\Repository\CheckInRepositoryInterface;
use App\Http\Requests\Admin\StoreCheckInRequest;

class CheckInController extends CrudController
{
    protected $instance = CheckIn::class;
    protected $service;

    public function __construct(CheckInRepositoryInterface $CheckInRepository)
    {
        parent::__construct($CheckInRepository);
        $this->service = new CheckInService();
    }

    public function checkIn()
    {
        $this->service->checkIn(user());
        return redirect()->route('web.admin.check_ins.index');
    }

    public function formRequest()
    {
        return app(StoreCheckInRequest::class);
    }
}
