const defaultConfig = require( '@wordpress/scripts/config/eslint.config.cjs' );

module.exports = [
	{
		ignores: [
			'**/.export/**',
			'**/dist/**',
			'src/assets/**',
			'src/languages/**',
		],
	},
	...defaultConfig,
	{
		files: [ 'src/src/blocks/**/*.js' ],
		rules: {
			'import/no-extraneous-dependencies': 'off',
			'import/no-unresolved': 'off',
		},
	},
];
