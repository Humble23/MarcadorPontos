@extends('admin.layouts.partials.crud.create')

@section('title', 'Cadastrar funcionário')

@section('content_header')
  <h1>Cadastrar funcionário</h1>
@stop

@section('form')
  @include('admin.users.form')
@stop
