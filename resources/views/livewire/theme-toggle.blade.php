<button wire:click="toggle" 
        class="relative inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
        title="{{ $darkMode ? 'Tema Claro' : 'Tema Escuro' }}">
    @if($darkMode)
        <!-- Sol (Tema Claro) -->
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
    @else
        <!-- Lua (Tema Escuro) -->
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
    @endif
</button>

<script>
    document.addEventListener('livewire:initialized', () => {
        // Aplicar tema inicial
        const darkMode = document.cookie.includes('darkMode=true');
        if (darkMode) {
            document.documentElement.classList.add('dark');
        }
        
        // Escutar mudanças de tema
        Livewire.on('theme-changed', (darkMode) => {
            if (darkMode) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    });
</script>