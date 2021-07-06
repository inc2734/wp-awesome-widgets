import ServerSideRender from '@wordpress/server-side-render';
import { __ } from '@wordpress/i18n';

import { Disabled, PanelBody, TextControl } from '@wordpress/components';

import { InspectorControls } from '@wordpress/block-editor';

export default function ( { attributes, setAttributes } ) {
	const { title } = attributes;

	const onChangeTitle = ( value ) =>
		setAttributes( {
			title: value,
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
					<TextControl
						label={ __( 'Title', 'inc2734-wp-awesome-widgets' ) }
						value={ title }
						placeholder={ __(
							'Profile',
							'inc2734-wp-awesome-widgets'
						) }
						onChange={ onChangeTitle }
					/>
				</PanelBody>
			</InspectorControls>

			<Disabled>
				<ServerSideRender
					block="wp-awesome-widgets/profile-box"
					attributes={ attributes }
				/>
			</Disabled>
		</>
	);
}
