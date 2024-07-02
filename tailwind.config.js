// tailwind.config.js

// Import des modules et thèmes par défaut de Tailwind CSS
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

// Export de la configuration Tailwind CSS
export default {
    // Spécification des fichiers Blade et PHP à analyser pour les classes utilisées
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    // Configuration du thème Tailwind avec extension personnalisée
    theme: {
        extend: {
            // Personnalisation de la famille de polices (ici, ajout de 'Figtree' à la liste par défaut)
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    // Activation des plugins Tailwind (dans ce cas, le plugin Forms)
    plugins: [forms],
};
