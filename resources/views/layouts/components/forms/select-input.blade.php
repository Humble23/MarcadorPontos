<label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
<select id="{{ $id }}" name="{{ $name }}" autocomplete="{{ $name }}" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    @foreach ($options as $option)
        <option value="{{ $option }}">{{ $option }}</option>
    @endforeach
</select>
