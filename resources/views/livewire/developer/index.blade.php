<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <svg class="h-8 w-8 text-blue-600 dark:text-blue-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Desenvolvedores</h1>
            </div>
            <a href="{{ route('developers.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Novo Desenvolvedor
            </a>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    <!-- Filtros -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Buscar</label>
                <input type="text" 
                       wire:model.live="search" 
                       placeholder="Nome ou email..."
                       class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Skill</label>
                <input type="text" 
                       wire:model.live="skillFilter" 
                       placeholder="Ex: PHP, Laravel..."
                       class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Senioridade</label>
                <select wire:model.live="seniorityFilter" 
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    <option value="">Todas</option>
                    <option value="Jr">Júnior</option>
                    <option value="Pl">Pleno</option>
                    <option value="Sr">Sênior</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Grid Responsivo -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
        @forelse($developers as $developer)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $developer->name }}
                    </h3>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full
                        @if($developer->seniority === 'Jr') bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200
                        @elseif($developer->seniority === 'Pl') bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200
                        @else bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 @endif">
                        {{ $developer->seniority }}
                    </span>
                </div>
                
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">
                    {{ $developer->email }}
                </p>
                
                <div class="mb-4">
                    <div class="flex flex-wrap gap-1">
                        @foreach($developer->skills as $skill)
                            <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs rounded-full">
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                </div>
                
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600 dark:text-gray-300">
                        {{ $developer->articles_count }} artigo(s)
                    </span>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('developers.edit', $developer) }}" 
                           class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 text-sm font-medium">
                            Editar
                        </a>
                        <button wire:click="delete({{ $developer->id }})" 
                                wire:confirm="Tem certeza que deseja excluir este desenvolvedor?"
                                class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 text-sm font-medium">
                            Excluir
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-600 dark:text-gray-300">Nenhum desenvolvedor encontrado.</p>
            </div>
        @endforelse
    </div>

    <!-- Paginação -->
    {{ $developers->links() }}
</div>
