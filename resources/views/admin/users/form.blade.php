<div class="grid grid-cols-6 gap-6">
  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Nome" name="name" value="{{ $instance->name ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="CPF" name="document" type="text" value="{{ $instance->document ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-6">
    <x-text-input label="Email" name="email" type="email" value="{{ $instance->email ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Ocupação" name="occupation" type="text" value="{{ $instance->occupation ?? null }}"></x-text-input>
  </div>

  @php
    $roles = [
        'Administrador',
        'Funcionário',
    ];
  @endphp
  <div class="col-span-6 sm:col-span-3">
    <x-select-input label="Nível de acesso" name="role" :options="$roles"></x-select-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Data de nascimento" name="birthdate" type="date" value="{{ $instance->birthdate ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Senha" name="password" type="password"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-6">
      <span class="text-lg">Endereço</span>
      <hr class="mt-3">
  </div>
  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="CEP" id="zipcode" name="zipcode" type="text" value="{{ $instance->zipcode ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Logradouro" name="address" type="text" value="{{ $instance->address ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Número" name="number" type="text" value="{{ $instance->number ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Complemento" name="complement" type="text" value="{{ $instance->complement ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Bairro" name="neighborhood" type="text" value="{{ $instance->neighborhood ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-2">
    <x-text-input label="Cidade" name="city" type="text" value="{{ $instance->city ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-1">
    <x-text-input label="Estado" name="state" type="text" value="{{ $instance->state ?? null }}"></x-text-input>
  </div>

</div>

@push('scripts')
  <script>
    var cpf = document.getElementById('document');
    var maskOptions = {
      mask: '000.000.000-00'
    };
    var mask = IMask(cpf, maskOptions);
    var zipcode = document.getElementById('zipcode');
    var maskOptions = {
      mask: '00000-000'
    };
    var mask = IMask(zipcode, maskOptions);
  </script>
@endpush
