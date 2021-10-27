<label for="{{ $name }}" class="block font-medium text-gray-700 cpf-mask text-md">{{ $label }}</label>
<input
    ref="{{ $name }}"
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id }}"
    @if ($keyup)
        x-on:keyup.debounce="{{ $keyup }}"
    @endif
    @if ($xModel)
        x-model="{{ $xModel }}"
    @else
        value="{{ $value }}"
    @endif
    autocomplete="given-name"
    class="block w-full px-2 py-2 mt-1 border-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

@include('admin.layouts.components.forms.erros')


