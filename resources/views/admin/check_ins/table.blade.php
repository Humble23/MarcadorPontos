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
              <th class="px-4 py-3">Data do registro</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @forelse($result as $row)
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
                    <td class="px-4 py-3 font-semibold border text-ms">{{ $row->age }}</td>
                    <td class="px-4 py-3 font-semibold border text-ms">{{ $row->manager_name ?? 'Sem gestor' }}</td>
                    {{-- <td class="px-4 py-3 text-xs border">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
                    </td> --}}
                    <td class="px-4 py-3 text-sm border">{{ \Carbon\Carbon::create($row->check_in_date)->format('d/m/Y h:i:s') }}</td>
                </tr>
            @empty
                <tr class="py-3 text-gray-700">
                    <td lass="px-4 py-3 border" colspan="5" class="text-center">Nenhum registro encontrado</td>
                </tr>
            @endforelse
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
