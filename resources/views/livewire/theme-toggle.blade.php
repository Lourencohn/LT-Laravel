<button 
        class="theme-toggle-btn relative inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 focus:text-gray-500 dark:focus:text-gray-200 transition duration-150 ease-in-out"
        title="Alternar Tema">
    <!-- Sol (Tema Claro) - mostra quando está no dark mode -->
    <svg class="sun-icon h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>
    <!-- Lua (Tema Escuro) - mostra quando está no light mode -->
    <svg class="moon-icon h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
    </svg>
</button>

<script>
(function() {
    'use strict';
    
    // Função para obter o valor do cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }
    
    // Função para definir cookie
    function setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
    }
    
    // Função para aplicar o tema
    function applyTheme(isDark) {
        const html = document.documentElement;
        const sunIcons = document.querySelectorAll('.sun-icon');
        const moonIcons = document.querySelectorAll('.moon-icon');
        
        if (isDark) {
            html.classList.add('dark');
            sunIcons.forEach(icon => icon.classList.remove('hidden'));
            moonIcons.forEach(icon => icon.classList.add('hidden'));
        } else {
            html.classList.remove('dark');
            sunIcons.forEach(icon => icon.classList.add('hidden'));
            moonIcons.forEach(icon => icon.classList.remove('hidden'));
        }
        
        // Salvar no cookie
        setCookie('darkMode', isDark ? 'true' : 'false', 365);
    }
    
    // Função para alternar tema
    function toggleTheme() {
        const isDark = document.documentElement.classList.contains('dark');
        applyTheme(!isDark);
    }
    
    // Aplicar tema inicial
    function initTheme() {
        const savedTheme = getCookie('darkMode');
        const isDark = savedTheme === 'true';
        applyTheme(isDark);
    }
    
    // Inicializar quando DOM estiver pronto
    function setupEventListeners() {
        const buttons = document.querySelectorAll('.theme-toggle-btn');
        buttons.forEach(button => {
            button.addEventListener('click', toggleTheme);
        });
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            initTheme();
            setupEventListeners();
        });
    } else {
        initTheme();
        setupEventListeners();
    }
})();
</script>