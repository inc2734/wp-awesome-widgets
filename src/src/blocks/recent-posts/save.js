import { useInnerBlocksProps } from '@wordpress/block-editor';

export default function ( { attributes } ) {
	const { anchor } = attributes;

	return (
		<div
			{ ...useInnerBlocksProps.save( {
				className: 'wp-block-wp-awesome-widgets-recent-posts',
			} ) }
			data-dynamic-block="wp-awesome-widgets/recent-posts"
			data-version="1"
			id={ !! anchor ? anchor : undefined }
		></div>
	);
}
