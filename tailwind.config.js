const _ = require('lodash')
const plugin = require('tailwindcss/plugin')
const defaultTheme = require('tailwindcss/defaultTheme')

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
         transparent: defaultTheme.colors.transparent,
         current: defaultTheme.colors.current,
         black: defaultTheme.colors.black,
         white: defaultTheme.colors.white,
         gray: defaultTheme.colors.gray
      },
      spacing: {
         '0': '0',
         '0-25r': '0.25rem',
         '0-5r': '0.5rem',
         '0-75r': '0.75rem',
         '1r': '1rem',
         '1-25r': '1.25rem',
         '1-5r': '1.5rem',
         '1-75r': '1.75rem',
         '2r': '2rem',
         '2-25r': '2.25rem',
         '2-5r': '2.5rem',
         '2-75r': '2.75rem',
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
         '33p': '33.333333%',
         '66p': '66.666667%',
         full: '100%',
         screen: '100vw',
      }),
      maxWidth: (theme, { breakpoints }) => ({
         ...theme('spacing'),
         none: 'none',
         full: '100%',
         ...breakpoints(theme('screens'))
      }),
      borderWidth: {
         '0': '0',
         '1px': '1px',
         '2px': '2px',
         '3px': '3px',
         '4px': '4px',
         '5px': '5px'
      },
      fontFamily: {
         'DMSans': ['DM Sans', 'sans-serif']
      },
      fontSize: {
         '0-7r': '0.7rem',
         '0-8r': '0.8rem',
         '0-9r': '0.9rem',
         '1r': '1rem',
         '1-1r': '1.1rem',
         '1-2r': '1.2rem',
         '1-3r': '1.3rem',
         '1-4r': '1.4rem',
         '1-5r': '1.5rem',
         '1-6r': '1.6rem',
         '1-7r': '1.7rem',
         '1-8r': '1.8rem',
         '1-9r': '1.9rem',
         '2r': '2rem',
         '2-1r': '2.1rem',
         '2-2r': '2.2rem',
         '2-3r': '2.3rem',
         '2-4r': '2.4rem',
         '2-5r': '2.5rem',
         '2-6r': '2.6rem',
         '2-7r': '2.7rem',
         '2-8r': '2.8rem',
         '2-9r': '2.9rem',
         '3r': '3rem',
         '3-5r': '3.5rem',
         '4r': '4rem',
         '4-5r': '4.5rem',
         '5r': '5rem',
         '5-5r': '5.5rem',
         '6r': '6rem',
         '6-5r': '6.5rem',
         '7r': '7rem',
         '7-5r': '7.5rem',
         '8r': '8rem',
         '8-5r': '8.5rem',
         '9r': '9rem',
         '9-5r': '9.5rem',
         '10r': '10rem'
      },
      fontWeight: {
         '100': '100',
         '200': '200',
         '300': '300',
         '400': '400',
         '500': '500',
         '600': '600',
         '700': '700',
         '800': '800',
         '900': '900'
      },
      lineHeight: {
         normal: 'normal',
         '1': '1',
         '1-25': '1.25',
         '1-50': '1.50',
         '2': '2'
      },
      opacity: {
         '0': '0',
         '10': '0.1',
         '20': '0.2',
         '30': '0.3',
         '40': '0.4',
         '50': '0.5',
         '60': '0.6',
         '70': '0.7',
         '80': '0.8',
         '90': '0.9',
         '100': '1'
      },
      zIndex: {
         auto: 'auto',
         '0': '0',
         '10': '10',
         '20': '20',
         '30': '30',
         '40': '40',
         '50': '50',
         '60': '60',
         '70': '70',
         '80': '80',
         '90': '90',
         '100': '100',
      },
      extend: {},
   },
   variants: {
      fontFamily: ['disabled'],
   },

   // Configuration - Fluid Typography Plugin
   textFluid: {
      'default': {
         min: '16px',
         max: '18px',
         minvw: '425px',
         maxvw: '1024px'
      },
   },
   plugins: [
      plugin(function({ addComponents, config}) {

         // Fluid Typography Plugin
         const textFluid = _.map(config('textFluid'), (value, key) => {
         let sizeDifference = parseFloat(value.max) - parseFloat(value.min)
         let windowDifference = parseFloat(value.maxvw) - parseFloat(value.minvw)
         return {
            [`.text-fluid-${key}`]: {
                  fontSize: `${value.min}`,
               [`@media (min-width: ${value.minvw} )`]: {
                  fontSize: `calc(${value.min} + ${sizeDifference} * (100vw - ${value.minvw}) / ${windowDifference})`,
               },
               [`@media (min-width: ${value.maxvw} )`]: {
                  fontSize: `${value.max}`,
               }
            },
         }
         })
         addComponents(textFluid)
      })
   ],
   corePlugins: {
      space: false,
      borderRadius: false,
      boxShadow: false,
      container: false,
      letterSpacing: false
   }
}