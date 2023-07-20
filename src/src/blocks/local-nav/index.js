import { registerBlockType } from '@wordpress/blocks';
import { pages as icon } from '@wordpress/icons';

import metadata from './block.json';
import edit from './edit';
import save from './save';

registerBlockType( metadata.name, {
	icon,
	edit,
	save,
} );
