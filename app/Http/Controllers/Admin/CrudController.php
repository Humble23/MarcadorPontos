<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Admin\Concerns\HasForm;
use DataTables;

abstract class CrudController extends Controller
{
    use HasForm;

    protected $repository;
    protected $columns;
    protected $table;
    protected $instance;

    public function __construct($repository)
    {
        $this->repository = $repository;
        $this->instance = app($this->instance);
        $this->table = $this->instance->getTable();
        $this->columns = Schema::getColumnListing($this->instance->getTable());
    }

    public function index(Request $request)
    {
        return view("admin.{$this->table}.index")
            ->with('instance', $this->instance)
            ->with('result', $this->repository->all());
    }

    public function create()
    {
        return view("admin.{$this->table}.create")
            ->with('instance', $this->instance);
    }

    public function edit($id)
    {
        $instance = $this->instance
            ->where('id', $id)
            ->first();

        return view("admin.{$this->table}.edit")
            ->with('instance', $instance)
            ->with('isUpdate', true);
    }

    public function store(Request $request)
    {
        $this->repository->create($this->inputStore());

        return view("admin.{$this->table}.index")
            ->with('instance', $this->instance);
    }

    public function inputStore()
    {
        $data = $this->formParams();
        return $data->toArray();
    }

    public function update($id)
    {
        $resource = $this->instance->find($id);

        if ($resource) {
            $resource = $this->repository->update($resource, $this->inputUpdate());

            return redirect()->route("web.admin.{$this->table}.index")
                ->with('success', 'Registro atualizado com sucesso!');
        }

        abort(404);
    }

    public function inputUpdate()
    {
        $this->columns = Schema::getColumnListing($this->instance->getTable());
        $data = $this->formParams();
        return $data->toArray();
    }

    public function delete($id)
    {
        $this->instance->where('id', $id)->delete();

        return redirect()
            ->route("web.admin.{$this->table}.index");
    }
}
