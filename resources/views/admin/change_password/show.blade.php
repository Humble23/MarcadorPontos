@extends('adminlte::page')

@section('title', 'Alterar senha')

@section('content_header')
    <h1>Alterar senha</h1>
@stop

@section('content')
<div class="mt-3 md:w-1/2 md:mt-0 md:col-span-2">
    @if (session('success'))
      <div class="px-4 py-3 mb-3 text-green-900 rounded bg-green-50" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => { show = false }, 3000)">
        <div class="flex">
          <div>
            <svg class="w-6 h-6 mr-4 text-green-500 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4l8-8l-1.41-1.42z" /></svg>
          </div>
          <div>
            <p class="text-sm text-green-500">{{ session('success') }}</p>
          </div>
        </div>
      </div>
    @endif
    <form action="{{ route('web.admin.change-password.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                <div class="space-y-4 md:mx-48">
                    <x-text-input label="Senha" name="password" type="password"></x-text-input>
                    <x-text-input label="Confirme a senha" name="password_confirmation" type="password"></x-text-input>
                    <div class="py-3 text-right bg-gray-50">
                        <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm w-100 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Alterar senha
                        </button>
                    </div>
                </div>
            </div>
      </div>
    </form>
  </div>
</div>
@stop

@section('footer')
  <p>Ticto</p>
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
  <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
@stop

@section('js')
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@stop
