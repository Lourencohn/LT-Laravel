<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <div class="flex items-center space-x-4">
            <a href="{{ route('articles.index') }}" 
               class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-gray-100">
                ← Voltar
            </a>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Editar Artigo</h1>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <form wire:submit="save">
            <div class="space-y-6">
                <!-- Título -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Título *
                    </label>
                    <input type="text" 
                           wire:model="title" 
                           class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    @error('title') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Conteúdo -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Conteúdo (HTML) *
                    </label>
                    <textarea wire:model="content" 
                              rows="10"
                              class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                              placeholder="Digite o conteúdo do artigo em HTML..."></textarea>
                    @error('content') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Data de Publicação -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Data de Publicação *
                    </label>
                    <input type="date" 
                           wire:model="published_at" 
                           class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    @error('published_at') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Imagem de Capa -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Imagem de Capa (opcional)
                    </label>
                    
                    @if($article->cover_image)
                        <div class="mb-3">
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">Imagem atual:</p>
                            <img src="{{ asset('storage/covers/' . $article->cover_image) }}" 
                                 alt="Capa atual" 
                                 class="w-32 h-32 object-cover rounded">
                        </div>
                    @endif
                    
                    <input type="file" 
                           wire:model="cover_image" 
                           accept="image/*"
                           class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    @error('cover_image') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                    
                    @if ($cover_image)
                        <div class="mt-3">
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">Nova imagem:</p>
                            <img src="{{ $cover_image->temporaryUrl() }}" 
                                 alt="Preview" 
                                 class="w-32 h-32 object-cover rounded">
                        </div>
                    @endif
                </div>

                <!-- Desenvolvedores -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Desenvolvedores *
                    </label>
                    @if($developers->count() > 0)
                        <div class="space-y-2">
                            @foreach($developers as $developer)
                                <label class="flex items-center">
                                    <input type="checkbox" 
                                           wire:model="selectedDevelopers" 
                                           value="{{ $developer->id }}"
                                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                        {{ $developer->name }} ({{ $developer->seniority }})
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Você precisa cadastrar pelo menos um desenvolvedor.
                            <a href="{{ route('developers.create') }}" class="text-blue-600 hover:text-blue-800">
                                Cadastrar desenvolvedor
                            </a>
                        </p>
                    @endif
                    @error('selectedDevelopers') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('articles.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">
                    Cancelar
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</div>