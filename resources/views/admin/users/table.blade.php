<section class="p-6 px-0 mx-auto font-mono">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-md-x-hidden">
        <table class="w-full">
          <thead>
            <tr class="font-semibold tracking-wide text-left text-gray-900 uppercase bg-gray-100 border-b border-gray-600 text-md">
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
                    <td class="px-4 py-3 font-semibold border text-ms">{{ $row->age() }}</td>
                    <td class="px-4 py-3 font-semibold border text-ms">{{ $row->manager_name ?? 'Sem gestor' }}</td>
                    {{-- <td class="px-4 py-3 text-xs border">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
                    </td> --}}
                    <td class="px-4 py-3 text-sm border">{{ $row->created_at->format('d/m/Y h:i:s') }}</td>
                    <td class="px-4 py-3 text-sm border">{{ $row->updated_at->format('d/m/Y h:i:s') }}</td>
                    <td class="px-4 py-3 text-sm border">
                        <a class="text-white text-blue-500 btn btn-sm btn-primary hover:text-blue-700" href="{{ route('web.admin.users.edit', $row->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <div x-data="{ modal: false }" class="inline-block">
                            <button class="text-white text-blue-500 btn btn-sm btn-danger hover:text-blue-700" x-on:click="modal = true">
                                <i class="fa fa-times"></i>
                            </button>
                            {{-- <button class="p-1 text-red-600 rounded hover:bg-red-600 hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            </button> --}}
                            @include('admin.layouts.components.dialog-modal')
                        </div>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        @if ($result->lastPage() > 1)
            <div class="p-3">
                {{ $result->links() }}
            </div>
        @endif
      </div>
    </div>
  </section>
