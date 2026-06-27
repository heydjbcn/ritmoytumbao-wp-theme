/** @type {import('tailwindcss').Config} */
/**
 * Paleta y tipografía REALES (extraídas en vivo del CSS computado de prod).
 *
 * Tokens medidos en https://ritmoytumbao-ds.es :
 *   - Color marca:     #62D8AC (verde menta — fondo de TODOS los botones, mismo que panel-app)
 *   - Texto principal: #292929 (Source Sans Pro 16px)
 *   - Heading h2:      #403F3F (Libre Baskerville 50px 800)
 *   - Fondo hero:      #373636 (gris oscuro casi negro)
 *   - Fondos suaves:   #F2F2F2, #F8F8F8
 *
 * Fuentes (Google Fonts):
 *   - Libre Baskerville  → Headings de sección (serif clásica, transmite tradición)
 *   - ADLaM Display      → Solo precios grandes (0€, 12€, 36,90€)
 *   - Source Sans Pro    → Body, botones (semibold 600)
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
          mint:        '#62D8AC',  // brand: bg de TODOS los CTAs
          'mint-dark': '#4FB995',  // hover
        },
        ink: {
          DEFAULT: '#292929',      // body text
          heading: '#403F3F',      // h2 secciones
          soft:    '#5C5C5C',
          mute:    '#A09E9E',
          dark:    '#373636',      // fondo hero / oscuros
        },
        paper: {
          DEFAULT: '#FFFFFF',
          alt:     '#F2F2F2',
          soft:    '#F8F8F8',
        },
      },
      fontFamily: {
        // Headings de sección (h1, h2, h3)
        serif:   ['"Libre Baskerville"', 'Georgia', 'serif'],
        // Precios y display extra grande
        display: ['"ADLaM Display"', 'Georgia', 'serif'],
        // Cuerpo, botones, navegación
        sans:    ['"Source Sans Pro"', '-apple-system', 'BlinkMacSystemFont', 'sans-serif'],
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
        soft: '0 4px 24px rgba(0,0,0,0.08)',
        card: '0 2px 18px rgba(0,0,0,0.06)',
      },
      borderRadius: {
        pill: '50px',
      },
    },
  },
  plugins: [],
};
