/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './source/**/*.blade.php',
    './source/**/*.md',
  ],
  theme: {
    extend: {
      // Straight out of "The Abbey Brand Guide.pdf" — keep this in sync if
      // the guide is ever revised.
      colors: {
        abbey: {
          green: '#3c5b3b',       // Abbey Green — primary
          midnight: '#00264d',    // Midnight Prayer — primary
          sage: '#8b9576',        // Pilgrim Sage — primary
          parchment: '#d4c4ab',   // Parchment — primary
          teal: '#638480',        // Muted Teal — accent
          gold: '#b69564',        // Ochre Gold — accent
          walnut: '#664629',      // Walnut Brown — accent
          red: '#d22532',         // Manuscript Red — use sparingly (per brand guide)
        },
      },
      fontFamily: {
        // Primary font in the brand guide is "Garamond Regular" for
        // headings/body/quotes. Garamond itself isn't a web font, so this
        // uses EB Garamond (Google Fonts) as the closest open equivalent —
        // swap in a licensed Garamond if the church has one.
        serif: ['"EB Garamond"', 'Garamond', 'Georgia', 'serif'],
        // Secondary font is "Avenir Regular" for subheadings/captions.
        // Avenir is a commercial Linotype font with no free web license, so
        // this substitutes Jost (Google Fonts), a similar geometric
        // sans-serif — swap for real Avenir web fonts if the church has a
        // license (e.g. via Adobe Fonts/Typekit).
        sans: ['"Jost"', '"Avenir Next"', 'Avenir', 'sans-serif'],
        // "Special font: Ellume" — used sparingly for social/poster
        // headlines per the brand guide. No open equivalent is wired up
        // here; treat `font-display` as a placeholder until the church
        // supplies a licensed copy of Ellume (or an agreed substitute).
        display: ['"Cormorant Garamond"', '"EB Garamond"', 'serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
