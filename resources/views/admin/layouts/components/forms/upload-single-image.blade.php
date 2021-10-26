<label>{{ $label }}</label>
<div x-data="imageViewer({{ $image ? '\'' . asset($image) . '\'' : null }})">
  <div class="mb-2">
    <!-- Show the image -->
    <template x-if="imageUrl">
      <img :src="imageUrl"
          class="object-cover border border-gray-200 rounded"
          style="width: {{ $width }}; height: {{ $height }};"
      >
    </template>

    <!-- Show the gray box when image is not available -->
    <template x-if="!imageUrl">
      <div
        class="bg-gray-100 border border-gray-200 rounded"
        style="width: {{ $width }}; height: {{ $height }};"
      ></div>
    </template>

    <label class="block w-full p-2 mt-3 mb-2 border-2 border-gray-200 rounded cursor-pointer" for="customFile">
      <input type="file" accept="image/*" name="{{ $name }}" class="sr-only" id="customFile" x-on:change="fileChosen">
      <span x-text="files ? files.map(file => file.name).join(', ') : 'Seleciona uma imagem'"></span>
    </label>
  </div>
</div>

@push('scripts')
  <script>
    function imageViewer(src = null) {
      return {
        imageUrl: src,
        files: null,

        fileChosen(event) {
          this.files = Object.values(event.target.files)
          this.fileToDataUrl(event, src => this.imageUrl = src)
        },

        fileToDataUrl(event, callback) {
          if (! event.target.files.length) return

          let file = event.target.files[0],
              reader = new FileReader()

          reader.readAsDataURL(file)
          reader.onload = e => callback(e.target.result)
        },
      }
    }
  </script>
@endpush

