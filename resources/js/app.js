import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Theme toggle functionality
(function () {
    // Initialize theme on page load
    const initializeTheme = () => {
        const isDark = localStorage.theme === 'dark' || 
                      (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
        
        console.log('Initializing theme:', { isDark, localStorageTheme: localStorage.theme });
        
        if (isDark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    };

    // Set theme function (global)
    window.setDarkClass = () => {
        const isDark = localStorage.theme === 'dark' || 
                      (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
        
        console.log('Setting theme:', { isDark, localStorageTheme: localStorage.theme });
        
        if (isDark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    };

    // Initialize on load
    initializeTheme();

    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (!('theme' in localStorage)) {
            console.log('System theme changed:', e.matches);
            window.setDarkClass();
        }
    });
})();

Alpine.start();
