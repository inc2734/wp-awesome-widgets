import ServerSideRender from '@wordpress/server-side-render';

import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { useSelect } from '@wordpress/data';
import { useMemo, useEffect } from '@wordpress/element';
import { postList as icon } from '@wordpress/icons';
import { __ } from '@wordpress/i18n';

import {
	Disabled,
	PanelBody,
	Placeholder,
	RangeControl,
	SelectControl,
	Spinner,
	ToggleControl,
} from '@wordpress/components';

import { toNumber } from '../../js/helper/block';

export default function ( { attributes, setAttributes, clientId } ) {
	const { postType, postsPerPage, showThumbnail, showTaxonomy } = attributes;

	useEffect( () => {
		if ( ! attributes.clientId ) {
			setAttributes( { clientId } );
		}
	}, [ clientId ] );

	const allPostTypes = useSelect( ( select ) => {
		const { getPostTypes } = select( 'core' );
		return getPostTypes( { per_page: -1 } ) || [];
	}, [] );

	const postTypes = useMemo(
		() =>
			allPostTypes.filter(
				( type ) =>
					type.viewable &&
					! type.hierarchical &&
					'media' !== type.rest_base
			),
		[ allPostTypes ]
	);

	const onChangePostType = ( value ) =>
		setAttributes( {
			postType: value,
		} );

	const onChangePostsPerPage = ( value ) =>
		setAttributes( {
			postsPerPage: toNumber( value, 1, 12 ),
		} );

	const onChangeShowThumbnail = ( value ) =>
		setAttributes( {
			showThumbnail: value,
		} );

	const onChangeShowTaxonomy = ( value ) =>
		setAttributes( {
			showTaxonomy: value,
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
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={ __(
							'Post Type',
							'inc2734-wp-awesome-widgets'
						) }
						value={ postType }
						onChange={ onChangePostType }
						options={ postTypes.map( ( _postType ) => ( {
							label: _postType.name,
							value: _postType.slug,
						} ) ) }
					/>

					<RangeControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={ __(
							'Number of posts',
							'inc2734-wp-awesome-widgets'
						) }
						value={ postsPerPage }
						onChange={ onChangePostsPerPage }
						min="1"
						max="12"
					/>

					<ToggleControl
						__nextHasNoMarginBottom
						label={ __(
							'Display thumbnail',
							'inc2734-wp-awesome-widgets'
						) }
						checked={ showThumbnail }
						onChange={ onChangeShowThumbnail }
					/>

					<ToggleControl
						__nextHasNoMarginBottom
						label={ __(
							'Display taxonomy',
							'inc2734-wp-awesome-widgets'
						) }
						checked={ showTaxonomy }
						onChange={ onChangeShowTaxonomy }
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...useBlockProps() }>
				{ ! allPostTypes ? (
					<Placeholder
						icon={ icon }
						label={ __(
							'Recent posts',
							'inc2734-wp-awesome-widgets'
						) }
					>
						<Spinner />
					</Placeholder>
				) : (
					<Disabled>
						<ServerSideRender
							block="wp-awesome-widgets/recent-posts"
							attributes={ attributes }
						/>
					</Disabled>
				) }
			</div>
		</>
	);
}
