export default function ({ attributes }) {
	const { anchor } = attributes;

	return (
		<div
			data-dynamic-block="wp-awesome-widgets/profile-box"
			data-version="1"
			id={!!anchor ? anchor : undefined}
		></div>
	);
}
