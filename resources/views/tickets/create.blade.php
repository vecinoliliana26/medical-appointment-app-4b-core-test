<x-admin-layout title="Nuevo Ticket | MediLink" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Soporte',
        'href' => route('tickets.index')
    ],
    [
        'name' => 'Nuevo Ticket',
    ],
]">

    <div class="mb-4">
        <h2 class="text-xl font-bold text-gray-800">Nuevo Ticket</h2>
    </div>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Reportar un problema</h3>
        <p class="mb-6 text-sm text-gray-500">Describe tu problema o duda y nuestro equipo de soporte se pondrá en contacto contigo.</p>
        
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título del problema</label>
                <input type="text" id="title" name="title" class="bg-gray-50 border border-blue-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción detallada</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end gap-3 mt-8">
                <a href="{{ route('tickets.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">
                    Cancelar
                </a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    Enviar Ticket
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>
