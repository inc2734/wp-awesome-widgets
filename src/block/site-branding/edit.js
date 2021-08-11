import ServerSideRender from '@wordpress/server-side-render';

import { InspectorControls } from '@wordpress/block-editor';
import { Disabled, PanelBody, TextareaControl } from '@wordpress/components';
import { useEffect } from '@wordpress/element';
import { __ } from '@wordpress/i18n';

export default function ( { setAttributes, attributes, clientId } ) {
	const { description } = attributes;

	useEffect( () => {
		if ( ! attributes.clientId ) {
			setAttributes( { clientId } );
		}
	}, [ clientId ] );

	const onChangeDescription = ( value ) =>
		setAttributes( {
			description: value,
		} );

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={ __(
						'Block Settings',
						'inc2734-wp-awesome-widgets'
					) }
				>
					<TextareaControl
						label={ __(
							'Site description',
							'inc2734-wp-awesome-widgets'
						) }
						help={ __(
							'HTML use allowed.',
							'inc2734-wp-awesome-widgets'
						) }
						value={ description }
						onChange={ onChangeDescription }
					/>
				</PanelBody>
			</InspectorControls>

			<Disabled>
				<ServerSideRender
					block="wp-awesome-widgets/site-branding"
					attributes={ attributes }
				/>
			</Disabled>
		</>
	);
}
