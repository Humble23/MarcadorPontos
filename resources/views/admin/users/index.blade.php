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
  <section class="mx-auto p-6 font-mono">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-md-x-hidden">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 py-3">ID</th>
              <th class="px-4 py-3">Nome</th>
              <th class="px-4 py-3">Idade</th>
              <th class="px-4 py-3">Nome do gestor</th>
              <th class="px-4 py-3">Criado em</th>
              <th class="px-4 py-3">Atualizado em</th>
              <th class="px-4 py-3">Ações</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach($result as $row)
                <tr class="text-gray-700">
                    <td class="px-4 py-3 border">
                        {{ $row->id }}
                    </td>
                    <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                            <div>
                                <p class="font-semibold text-black">{{ $row->name }}</p>
                                <p class="text-xs text-gray-600">{{ $row->occupation }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">{{ $row->age() }}</td>
                    <td class="px-4 py-3 text-ms font-semibold border">Nome do gestor</td>
                    {{-- <td class="px-4 py-3 text-xs border">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
                    </td> --}}
                    <td class="px-4 py-3 text-sm border">{{ $row->created_at->format('d/m/Y h:i:s') }}</td>
                    <td class="px-4 py-3 text-sm border">{{ $row->updated_at->format('d/m/Y h:i:s') }}</td>
                    <td class="px-4 py-3 text-sm border">
                        <a class="btn btn-sm btn-primary text-blue-500 hover:text-blue-700 text-white" href="{{ route('web.admin.users.edit', $row->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-sm btn-danger text-blue-500 hover:text-blue-700 text-white" href="{{ route('web.admin.users.edit', $row->id) }}">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
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
