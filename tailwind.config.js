/** @type {import('tailwindcss').Config} */
module.exports = {
    // The various configurable Tailwind configuration files.
    presets: [
        require('tailwindcss/defaultConfig'),
        require('./tailwind.config.typography.js'),
        require('./tailwind.config.own.js'),
        require('./tailwind.config.site.js'),
    ],
    // Configure files to scan for utility classes (JIT).
    content: [
        './resources/views/**/*.blade.php',
        './resources/views/**/*.html',
        './resources/js/**/*.js',
        './content/**/*.md',
        './vendor/studio1902/**/*.blade.php',
        './vendor/studio1902/**/*.html',
        './vendor/studio1902/**/*.js',
    ],
    safelist: []
};
