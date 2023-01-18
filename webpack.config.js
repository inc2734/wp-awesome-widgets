const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );
const plugins = [ ...defaultConfig.plugins ];
plugins.shift(); //delete plugins.CleanWebpackPlugin
// plugins.shift(); //delete plugins.CopyWebpackPlugin

module.exports = {
  ...defaultConfig,
  resolve: {
    ...defaultConfig.resolve,
    alias: {
      ...defaultConfig.resolve.alias,
      '@wpaw/helper': path.resolve( __dirname, 'src/src/js/helper/block' ),
    },
  },
  plugins,
};
