@extends('admin.layouts.partials.crud.create')

@section('title', 'Cadastrar usuários')

@section('content_header')
  <h1>Cadastrar usuários</h1>
@stop

@section('form')
  @include('admin.users.form')
@stop
