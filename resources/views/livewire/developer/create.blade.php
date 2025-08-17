<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <div class="flex items-center space-x-4">
            <a href="{{ route('developers.index') }}" 
               class="text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                ← Voltar
            </a>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Novo Desenvolvedor</h1>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <form wire:submit="save">
            <div class="space-y-6">
                <!-- Nome -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Nome *
                    </label>
                    <input type="text" 
                           wire:model="name" 
                           class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    @error('name') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Email *
                    </label>
                    <input type="email" 
                           wire:model="email" 
                           class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    @error('email') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Senioridade -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Senioridade *
                    </label>
                    <select wire:model="seniority" 
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="">Selecione...</option>
                        <option value="Jr">Júnior</option>
                        <option value="Pl">Pleno</option>
                        <option value="Sr">Sênior</option>
                    </select>
                    @error('seniority') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Skills -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Skills *
                    </label>
                    <div class="flex space-x-2 mb-3">
                        <input type="text" 
                               wire:model="newSkill" 
                               wire:keydown.enter.prevent="addSkill"
                               placeholder="Ex: PHP, Laravel, JavaScript..."
                               class="flex-1 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <button type="button" 
                                wire:click="addSkill"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                            Adicionar
                        </button>
                    </div>
                    
                    @if(count($skills) > 0)
                        <div class="flex flex-wrap gap-2">
                            @foreach($skills as $index => $skill)
                                <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">
                                    {{ $skill }}
                                    <button type="button" 
                                            wire:click="removeSkill({{ $index }})"
                                            class="ml-2 text-blue-600 hover:text-blue-800">
                                        ×
                                    </button>
                                </span>
                            @endforeach
                        </div>
                    @endif
                    
                    @error('skills') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('developers.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">
                    Cancelar
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>
