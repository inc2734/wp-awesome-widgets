import { useInnerBlocksProps } from '@wordpress/block-editor';

export default function ( { attributes } ) {
	const { anchor } = attributes;

	return (
		<div
			{ ...useInnerBlocksProps.save( {
				className: 'wp-block-wp-awesome-widgets-profile-box',
			} ) }
			data-dynamic-block="wp-awesome-widgets/profile-box"
			data-version="1"
			id={ !! anchor ? anchor : undefined }
		></div>
	);
}
