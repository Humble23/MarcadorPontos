<div class="grid grid-cols-6 gap-6">
  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Nome" name="name" value="{{ $instance->name ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Email" name="email" type="email" value="{{ $instance->email ?? null }}"></x-text-input>
  </div>

  <div class="col-span-6 sm:col-span-3">
    <x-text-input label="Senha" name="password" type="password"></x-text-input>
  </div>

  {{-- <div class="col-span-6 sm:col-span-3">
    <x-select-input label="Acesso" name="role" :options="$roles"></x-select-input>
  </div> --}}
</div>
