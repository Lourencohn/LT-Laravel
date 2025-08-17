import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Theme Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Função para obter cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }
    
    // Função para definir cookie
    function setCookie(name, value, days = 365) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
    }
    
    // Função para aplicar tema
    function applyTheme(isDark) {
        const html = document.documentElement;
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');
        
        if (isDark) {
            html.classList.add('dark');
            if (sunIcon) sunIcon.classList.remove('hidden');
            if (moonIcon) moonIcon.classList.add('hidden');
        } else {
            html.classList.remove('dark');
            if (sunIcon) sunIcon.classList.add('hidden');
            if (moonIcon) moonIcon.classList.remove('hidden');
        }
        
        setCookie('darkMode', isDark ? 'true' : 'false');
        console.log('Tema aplicado:', isDark ? 'escuro' : 'claro');
    }
    
    // Inicializar tema
    function initTheme() {
        const savedTheme = getCookie('darkMode');
        const isDark = savedTheme === 'true';
        applyTheme(isDark);
        console.log('Tema inicial:', isDark ? 'escuro' : 'claro');
    }
    
    // Alternar tema
    function toggleTheme() {
        const isDark = document.documentElement.classList.contains('dark');
        applyTheme(!isDark);
        console.log('Tema alternado para:', !isDark ? 'escuro' : 'claro');
    }
    
    // Inicializar
    initTheme();
    
    // Adicionar event listener
    const themeToggle = document.getElementById('themeToggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', function(e) {
            e.preventDefault();
            toggleTheme();
        });
        console.log('Event listener adicionado ao botão de tema');
    } else {
        console.log('Botão de tema não encontrado');
    }
});
