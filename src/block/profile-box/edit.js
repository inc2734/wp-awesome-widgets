import ServerSideRender from '@wordpress/server-side-render';

import { Disabled } from '@wordpress/components';
import { useEffect } from '@wordpress/element';

export default function ( { setAttributes, attributes, clientId } ) {
	useEffect( () => {
		if ( ! attributes.clientId ) {
			setAttributes( { clientId } );
		}
	}, [ clientId ] );

	return (
		<Disabled>
			<ServerSideRender
				block="wp-awesome-widgets/profile-box"
				attributes={ attributes }
			/>
		</Disabled>
	);
}
