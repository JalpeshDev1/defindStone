module.exports = {
  content: [
    "./*.php",
    "./app/**/*.php",
    "./resources/**/*.php",
    "./resources/**/**/*.php",
    "./resources/**/*.js",
    "./resources/**/*.scss",
    "./page-templates/*.php",
    "./woocommerce/*.php",
  ],
  safelist: [
    "object-center",
    "object-left",
    "object-right",
    "sr-only",
    "text-accent",
  ],
  theme: {
    extend: {
      keyframes: {
        fade: {
          from: { opacity: "0" },
          to: { opacity: "1" },
        },
      },
      container: {
      padding: {
        DEFAULT: "15px",
      },
      center: true,
    },
      screens: {
        xs:'479px',
        sm: '640px',
        md: '768px',
        lg: '1024px',
        xl: '1200px',
        '2xl': '1440px', 
      },
      maxWidth: {
        container: '1320px',
      },
      margin:{
        '77':'4.813rem',
        '26px':"1.625rem",
      },
      colors: {
        primary: "#475362",
        secondary: "#67575B",
        tertiary: "#BFBFBF",
        light: "#67575B",
        accent: "#948B82",
        dark: "#151515",
      },
      fontFamily: {
        gilroy: ["Gilroy", "sans-serif"],
        prompt: ["Prompt", "sans-serif"],
        telegraf: ["Telegraf", "sans-serif"],
      },
      fontSize: {
        xs: "0.64rem",
        sm: "0.8rem",
        base: "1rem",
        lg: "1.15rem",
        "2xl": "1.25rem",
        "3xl": "1.563rem",
        "4xl": "2rem",
        "5xl": "2.441rem",
        "6xl": "3.000rem",
        "7xl": "4.30rem",
        '42': '2.625rem',
        '27': '1.688rem'
      },
       boxShadow: {
        stone: '0px 4px 21px 4px rgba(0, 0, 0, 0.2)',
      },
    },
  },
  plugins: [],
};
