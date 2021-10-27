<div class="items-start d-flex flex-column">
  <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
  <select id="{{ $id }}"
          name="{{ $name }}"
          ref="{{ $name }}"
          autocomplete="{{ $name }}"
          @if ($change)
            x-on:change="{{ $change }}"
          @endif
          @if ($xModel)
            x-model="{{ $xModel }}"
          @endif
          class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          <option value="">Seleciona uma opção</option>
      @foreach ($options as $option)
          @if ($key && $text)
            <option value="{{ $option[$key] }}" {{ $value === $option[$key] ? 'selected' : '' }}>{{ $option[$text] }}</option>
          @else
            <option value="{{ $option }}" {{ $value === slugfy($option) ? 'selected' : '' }}>{{ $option }}</option>
          @endif
      @endforeach
  </select>
</div>

@include('admin.layouts.components.forms.erros')
