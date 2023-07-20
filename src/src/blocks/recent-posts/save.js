export default function ( { attributes } ) {
	const { anchor } = attributes;

	return (
		<div
			data-dynamic-block="wp-awesome-widgets/recent-posts"
			data-version="1"
			id={ !! anchor ? anchor : undefined }
		></div>
	);
}
