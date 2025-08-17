<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <svg class="h-8 w-8 text-green-600 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Artigos</h1>
            </div>
            <a href="{{ route('articles.create') }}" 
               class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Novo Artigo
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
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Buscar</label>
                <input type="text" 
                       wire:model.live="search" 
                       placeholder="Título ou conteúdo..."
                       class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            </div>
        </div>
    </div>

    <!-- Grid Responsivo -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
        @forelse($articles as $article)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                @if($article->cover_image)
                    <img src="{{ asset('storage/covers/' . $article->cover_image) }}" 
                         alt="{{ $article->title }}"
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                        <span class="text-gray-600 dark:text-gray-300">Sem imagem</span>
                    </div>
                @endif
                
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                        {{ $article->title }}
                    </h3>
                    
                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-3 line-clamp-3">
                        {!! Str::limit(strip_tags($article->content), 100) !!}
                    </p>
                    
                    <div class="flex justify-between items-center text-sm text-gray-600 dark:text-gray-300 mb-4">
                        <span>{{ $article->published_at->format('d/m/Y') }}</span>
                        <span>{{ $article->developers_count }} dev(s)</span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <a href="{{ route('articles.edit', $article) }}" 
                               class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 text-sm font-medium">
                                Editar
                            </a>
                            <button wire:click="delete({{ $article->id }})" 
                                    wire:confirm="Tem certeza que deseja excluir este artigo?"
                                    class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 text-sm font-medium">
                                Excluir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-600 dark:text-gray-300">Nenhum artigo encontrado.</p>
                <a href="{{ route('articles.create') }}" 
                   class="mt-4 inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Criar seu primeiro artigo
                </a>
            </div>
        @endforelse
    </div>

    <!-- Paginação -->
    {{ $articles->links() }}
</div>
