const colors = require('tailwindcss/colors')
import('tailwindcss').Config
module.exports = {
    content: ["./src/**/*.{html,js}"],    
        
theme: {
    
    },
    extend: {
},
plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
],
}
