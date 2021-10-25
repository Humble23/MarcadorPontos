<div
  class="fixed inset-0 top-0 left-0 flex items-center justify-center h-screen bg-center bg-no-repeat bg-cover outline-none opacity-70 min-w-screen animated fadeIn faster focus:outline-none" style="z-index: 5000;"
  id="modal-id">
  <div class="absolute inset-0 z-0" style="background: rgba(0, 0, 0, 0.4);"></div>
  <div class="relative max-w-lg p-3 mx-auto my-auto bg-white shadow-lg" style="border-radius: 20px;">
    <!--content-->
    <div class="">
      <!--body-->
      <div class="justify-center flex-auto px-3 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="flex items-center w-4 h-4 mx-auto -m-1 text-red-600" fill="none"
          viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="flex items-center w-16 h-16 mx-auto text-red-600"
          viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd"
            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
            clip-rule="evenodd" />
        </svg>
        <h2 class="py-4 pb-0 text-lg font-bold ">Tem certeza?</h3>
          <p class="px-8 text-sm text-gray-500">Você deseja mesmo apagar o registro?
            Essa ação não pode ser desfeita</p>
      </div>

      <!--footer-->
      <div class="p-3 pt-0 space-x-4 text-center md:block">
        <button
          class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-gray-600 bg-white border rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-gray-100">
          Cancelar
        </button>
        <button
          class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white bg-red-600 border border-red-600 rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-red-600">Deletar</button>
      </div>
    </div>
  </div>
</div>
