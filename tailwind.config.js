module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        main: ["Poppins"]
      },
      fontSize: {
        "pricy-lg": "39.8px",
        "pricy-large": "26.88px",
        "pricy-medium": "19.96px",
        "pricy-base": "17.44px",
        "pricy-sm": "14.64px",
        "pricy-xs": "9px"
      },
      colors: {
        "pricy-yellow": "#FFD965",
        "pricy-gray": {
          "100": "#F2F5FD",
          "300": "#B3B3B3",
          "200": "#424242",
          "400": "#1B2124",
          "500": "#6E6893"
        }
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
