@extends('adminlte::page')

@section('title', 'Registro de pontos')

@section('content_header')
    <h1>Registro de pontos</h1>
@stop

@section('content')
    <div class="md:flex {{ !user()->isAdm() ? 'md:justify-end' : 'md:justify-between' }} sm:flex-column">
        @if (user()->isAdm())
            <form method="get">
                <div class="md:space-x-3">
                    @php
                        $fromDate = request()->from_date ?? now()->format('Y-m-d');
                        $toDate = request()->to_date ?? now()->addDay('1')->format('Y-m-d');
                    @endphp
                    <div class="md:inline-block">
                        <x-text-input label="De" name="from_date" type="date" value="{{ $fromDate }}"></x-text-input>
                    </div>
                    <div class="md:inline-block">
                        <x-text-input label="Até" name="to_date" type="date" value="{{ $toDate }}"></x-text-input>
                    </div>
                    <button class="my-3 md:inline-block md:my-0 btn btn-primary">
                        <i class="fas fa-search"></i>
                        Filtrar
                    </button>
                </div>
            </form>
        @endif
        <div class="flex align-items-end md:mb-4">
            <a class="btn btn-primary" href="#" id="check-in">
                <i class="fas fa-fingerprint"></i> Regitrar ponto
            </a>
        </div>
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
  <script>
    function createForm(url, method) {
        let form = document.createElement('form');
        form.setAttribute('method', method);
        form.setAttribute('action', url);
        csrf = document.createElement('input');
        csrf.setAttribute('type', 'hidden');
        csrf.setAttribute('name', '_token');
        csrf.setAttribute('value', "{{ csrf_token() }}");
        form.appendChild(csrf);

        return form;
    }

    let checkInButton = document.querySelector('#check-in');

    checkInButton.addEventListener('click', function(e) {
        e.preventDefault();
        let url = "{{ route('web.admin.check_ins.check_in') }}";

        let form = createForm(url, 'POST');
        document.body.appendChild(form);
        form.submit();
    });
  </script>
@stop
