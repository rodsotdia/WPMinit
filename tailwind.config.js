const { colors } = require('tailwindcss/defaultTheme')

module.exports = {
   purge: [
      './*.php',
      './**/*.php'
   ],
   theme: {
      screens: {
         'xsm': '425px',
         'sm': '640px',
         'md': '800px',
         'lg': '1024px',
         'xl': '1280px',
         '2xl': '1366px',
         '3xl': '1536px'
      },
      colors: {
         transparent: colors.transparent,
         current: colors.current,
         black: colors.black,
         white: colors.white,
         gray: colors.gray
      },
      spacing: {
         '0-1/4r': '0.25rem',
         '0-2/4r': '0.5rem',
         '0-3/4r': '0.75rem',
         '1r': '1rem',
         '1-1/4r': '1.25rem',
         '1-2/4r': '1.5rem',
         '1-3/4r': '1.75rem',
         '2r': '2rem',
         '2-1/4r': '2.25rem',
         '2-2/4r': '2.5rem',
         '2-3/4r': '2.75rem',
         '3r': '3rem',
         '4r': '4rem',
         '5r': '5rem',
         '6r': '6rem',
         '7r': '7rem',
         '8r': '8rem',
         '9r': '9rem',
         '10r': '10rem',
         '11r': '11rem',
         '12r': '12rem',
         '13r': '13rem',
         '14r': '14rem',
         '15r': '15rem',
      },
      width: theme => ({
         ...theme('spacing'),
         auto: 'auto',
         '5p': '5%',
         '10p': '10%',
         '15p': '15%',
         '20p': '20%',
         '25p': '25%',
         '30p': '30%',
         '35p': '35%',
         '40p': '40%',
         '45p': '45%',
         '50p': '50%',
         '55p': '55%',
         '60p': '60%',
         '65p': '65%',
         '70p': '70%',
         '75p': '75%',
         '80p': '80%',
         '85p': '85%',
         '90p': '90%',
         '95p': '95%',
         '1/3': '33.333333%',
         '2/3': '66.666667%',
         full: '100%',
         screen: '100vw',
      }),
      fontFamily: {
         'DMSans': ['DM Sans', 'sans-serif']
      },

      extend: {},
   },
   variants: {
      fontFamily: ['disabled'],
   },
   plugins: [],
}