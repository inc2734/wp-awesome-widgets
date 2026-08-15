const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

if ( ! Array.isArray( defaultConfig ) && defaultConfig?.plugins ) {
	const plugins = defaultConfig.plugins.filter(
		( plugin ) => 'CopyPlugin' !== plugin.constructor.name
	);

	module.exports = {
		...defaultConfig,
		output: {
			...defaultConfig.output,
			clean: false,
		},
		plugins,
	};
} else {
	module.exports = defaultConfig;
}
