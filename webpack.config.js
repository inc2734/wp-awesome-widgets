const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
  resolve: {
		...defaultConfig.resolve,
    alias: {
			...defaultConfig.resolve.alias,
      '@wpaw/helper': path.resolve( __dirname, 'src/src/js/helper/block' ),
    },
	},
};
