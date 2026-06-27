/** @type {import('tailwindcss').Config} */
/**
 * Paleta v7 — rediseño visual basado en mockup Cloud Design.
 * (Diferencias clave vs v6: paper cálido #F6F4F1, dark más profundo #262524,
 * inks más cálidos, mint-dark #3FB389, nuevo forest #173C30 para texto de CTAs.)
 *
 * Tokens v7:
 *   - Mint marca:   #62D8AC (igual que antes)
 *   - Mint hover:   #3FB389 (era #4FB995)
 *   - Forest:       #173C30 (NUEVO — color de texto sobre botones mint)
 *   - Mint soft:    #EAF8F1 / #C7EADC (acentos sutiles, numerales de cards)
 *   - Paper:        #F6F4F1 / #F0ECE7 / #FBFAF8 (gama beige cálida)
 *   - Ink dark:     #262524 (fondo hero/CTAs oscuros, era #373636)
 *   - Inks:         #33302E body · #2A2727 heading · #6B6663 soft · #A8A29E mute
 *
 * Fuentes: las mismas (Libre Baskerville · ADLaM Display · Source Sans 3).
 */
module.exports = {
  content: [
    './**/*.php',
    './assets/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        ryt: {
          mint:        '#62D8AC',
          'mint-dark': '#3FB389',
          'mint-soft': '#EAF8F1',
          'mint-glow': '#C7EADC',
          forest:      '#173C30',
        },
        ink: {
          DEFAULT: '#33302E',
          heading: '#2A2727',
          soft:    '#6B6663',
          mute:    '#A8A29E',
          dark:    '#262524',
        },
        paper: {
          DEFAULT: '#F6F4F1',
          alt:     '#F0ECE7',
          soft:    '#FBFAF8',
        },
      },
      backgroundImage: {
        'mint-grad': 'linear-gradient(165deg,#6FE0BA,#3FB389)',
      },
      fontFamily: {
        serif:   ['"Libre Baskerville"', 'Georgia', 'serif'],
        display: ['"ADLaM Display"', 'Georgia', 'serif'],
        sans:    ['"Source Sans 3"', '"Source Sans Pro"', '-apple-system', 'BlinkMacSystemFont', 'sans-serif'],
      },
      container: {
        center: true,
        padding: {
          DEFAULT: '1rem',
          sm:      '1.5rem',
          lg:      '2rem',
        },
        screens: {
          sm:  '640px',
          md:  '768px',
          lg:  '1024px',
          xl:  '1200px',
          '2xl': '1320px',
        },
      },
      boxShadow: {
        soft:    '0 4px 24px rgba(0,0,0,0.08)',
        card:    '0 12px 36px rgba(38,37,36,0.05)',
        'card-lg':'0 16px 44px rgba(38,37,36,0.06)',
        cta:     '0 10px 28px rgba(98,216,172,0.32)',
        'cta-sm':'0 10px 24px rgba(98,216,172,0.28)',
      },
      borderRadius: {
        pill: '50px',
      },
    },
  },
  plugins: [],
};
