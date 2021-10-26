@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
  <div class="d-flex justify-content-end">
    <a class="btn btn-primary" href="{{ route('web.admin.users.create') }}">
        Adicionar
    </a>
  </div>
  @include('admin.check_ins.table')
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
