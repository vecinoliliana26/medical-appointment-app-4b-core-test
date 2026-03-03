<x-admin-layout title="Soporte | MediLink" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Soporte',
    ],
]">

    <div class="mb-4 flex justify-between items-center w-full">
        <h2 class="text-xl font-bold text-gray-800">Soporte</h2>
        <a href="{{ route('tickets.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Nuevo Ticket
        </a>
    </div>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">¡Éxito!</span> {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">USUARIO</th>
                    <th scope="col" class="px-6 py-3">TÍTULO</th>
                    <th scope="col" class="px-6 py-3">ESTADO</th>
                    <th scope="col" class="px-6 py-3">FECHA</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            #{{ $ticket->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ticket->user->name ?? 'Usuario Eliminado' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ticket->title }}
                        </td>
                        <td class="px-6 py-4">
                            @if($ticket->status === 'Abierto')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Abierto</span>
                            @else
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ $ticket->status }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $ticket->created_at->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center">No hay tickets reportados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-layout>
