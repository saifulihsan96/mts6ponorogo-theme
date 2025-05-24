const path = require("path");

module.exports = {
  entry: {
    main: "./js/script.js",
    pass: "./app-passed/assets/script-passed.js",
  },
  output: {
    filename: "[name].bundle.js",
    path: path.resolve(__dirname, "dist/js"),
  },
  mode: "production",
};
