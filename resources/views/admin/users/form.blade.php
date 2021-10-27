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
    <x-select-input label="Nível de acesso" name="role" :options="$roles" value="{{ $instance->role ?? null }}"></x-select-input>
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

</div>
<div class="grid grid-cols-6 gap-6" x-data="app()">
  <div class="col-span-6 sm:col-span-3">
      <x-text-input label="CEP" id="zipcode" keyup="getAddress()" name="zipcode" type="text" x-model="zipcode"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
      <x-text-input label="Logradouro" name="address" type="text" x-model="address"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
      <x-text-input label="Número" name="number" type="text" x-model="number"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
      <x-text-input label="Complemento" name="complement" type="text" x-model="complement"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
      <x-text-input label="Bairro" name="neighborhood" type="text" x-model="neighborhood"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-2">
      <x-text-input label="Cidade" name="city" type="text" x-model="city"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-1">
      <x-text-input label="Estado" name="state" type="text" x-model="state"></x-text-input>
  </div>
</div>

@push('scripts')
  <script>
    function app() {
        return {
            zipcode: "{{ $instance->zipcode ?? null }}",
            address: "{{ $instance->address ?? null }}",
            neighborhood: "{{ $instance->neighborhood ?? null }}",
            city: "{{ $instance->city ?? null }}",
            state: "{{ $instance->state ?? null }}",
            number: "{{ $instance->number ?? null }}",
            complement: "{{ $instance->complement ?? null }}",
            getAddress() {
                let zipcode = this.zipcode.replace(/-/g, '');

                if (zipcode.length == 8) {
                    fetch(`https://viacep.com.br/ws/${this.zipcode}/json/`)
                        .then(response => response.json())
                        .then(response => {
                            this.address = response.logradouro;
                            this.neighborhood = response.bairro;
                            this.city = response.localidade;
                            this.state = response.uf;
                        })
                        .catch(error => {
                            console.log(error)
                        })
                }
            }
        }
    }

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
