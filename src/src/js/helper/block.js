import {
	registerBlockType,
	unstable__bootstrapServerSideBlockDefinitions, // eslint-disable-line camelcase
} from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

export const registerBlock = ( block ) => {
	if ( ! block ) {
		return;
	}

	const { metadata, settings, name } = block;
	if ( metadata ) {
		if ( !! metadata.title ) {
			/* eslint @wordpress/i18n-no-variables: 0 */
			metadata.title = __( metadata.title, 'inc2734-wp-awesome-widgets' );
			settings.title = metadata.title;
		}
		if ( !! metadata.description ) {
			/* eslint @wordpress/i18n-no-variables: 0 */
			metadata.description = __(
				metadata.description,
				'inc2734-wp-awesome-widgets'
			);
			settings.description = metadata.description;
		}
		if ( !! metadata.keywords ) {
			/* eslint @wordpress/i18n-no-variables: 0 */
			metadata.keywords = __( metadata.keywords, 'inc2734-wp-awesome-widgets' );
			settings.keywords = metadata.keywords;
		}
	}
	registerBlockType( { name, ...metadata }, settings );
};

export const toNumber = ( value, min = 0, max = null ) => {
	value = Number( value );

	if ( isNaN( value ) || value < min ) {
		value = min;
	}

	if ( null !== max && value > max ) {
		value = max;
	}

	return value;
};
