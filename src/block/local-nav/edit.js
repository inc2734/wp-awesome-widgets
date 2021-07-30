import ServerSideRender from '@wordpress/server-side-render';

import { InspectorControls } from '@wordpress/block-editor';
import { useEffect } from '@wordpress/element';
import { __ } from '@wordpress/i18n';

import {
	Disabled,
	PanelBody,
	SelectControl,
	ToggleControl,
} from '@wordpress/components';

export default function ( { attributes, setAttributes, clientId } ) {
	const {
		direction,
		displayTopLevelPageTitle,
		displayOnlyHaveDescendants,
	} = attributes;

	useEffect( () => {
		if ( ! attributes.clientId ) {
			setAttributes( { clientId } );
		}
	}, [ clientId ] );

	const onChangeDirection = ( value ) =>
		setAttributes( {
			direction: value,
		} );

	const onChangeDisplayTopLevelPageTitle = ( value ) =>
		setAttributes( {
			displayTopLevelPageTitle: value,
		} );

	const onChangeDisplayOnlyHaveDescendants = ( value ) =>
		setAttributes( {
			displayOnlyHaveDescendants: value,
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
					<SelectControl
						label={ __(
							'Direction',
							'inc2734-wp-awesome-widgets'
						) }
						value={ direction }
						onChange={ onChangeDirection }
						options={ [
							{
								label: __(
									'Vertical',
									'inc2734-wp-awesome-widgets'
								),
								value: 'vertical',
							},
							{
								label: __(
									'Horizontal',
									'inc2734-wp-awesome-widgets'
								),
								value: 'horizontal',
							},
						] }
					/>

					<ToggleControl
						label={ __(
							'Display the page title of the top-level',
							'inc2734-wp-awesome-widgets'
						) }
						checked={ displayTopLevelPageTitle }
						onChange={ onChangeDisplayTopLevelPageTitle }
					/>

					<ToggleControl
						label={ __(
							'Display only when you have descendants',
							'inc2734-wp-awesome-widgets'
						) }
						checked={ displayOnlyHaveDescendants }
						onChange={ onChangeDisplayOnlyHaveDescendants }
					/>
				</PanelBody>
			</InspectorControls>

			<Disabled>
				<ServerSideRender
					block="wp-awesome-widgets/local-nav"
					attributes={ attributes }
				/>
			</Disabled>
		</>
	);
}
