const path = require('path');

module.exports = {
  entry: {
    main: './js/script.js',
  },
  output: {
    filename: '[name].bundle.js',
    path: path.resolve(__dirname, 'dist/js'),
  },
  mode: 'production',
};