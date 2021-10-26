@extends('adminlte::page')

@section('title', 'Atualizar ' . modelAttribute(get_class($instance), $instance->getTable()))

@section('content_header')
    <h1>Atualizar {{ modelAttribute(get_class($instance), $instance->getTable()) }}</h1>
@stop

@section('content')
  <div class="mt-3 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:mt-0 md:col-span-2">
        {{ html()->form('PUT', route("web.admin.{$instance->getTable()}.update", $instance->id))->open() }}
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            @yield('form')
            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
              <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Atualizar
              </button>
            </div>
          </div>
        </div>
        {{ html()->form()->close() }}
      </div>
    </div>
  </div>
@stop

@section('footer')
<p>Devlab</p>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@stop
