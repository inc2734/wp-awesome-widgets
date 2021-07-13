import ServerSideRender from '@wordpress/server-side-render';
import { __ } from '@wordpress/i18n';

import { Disabled } from '@wordpress/components';

export default function ( { attributes } ) {
	return (
    <Disabled>
      <ServerSideRender
        block="wp-awesome-widgets/profile-box"
        attributes={ attributes }
      />
    </Disabled>
	);
}
