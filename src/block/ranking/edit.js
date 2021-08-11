import ServerSideRender from '@wordpress/server-side-render';

import {
	InspectorControls,
	__experimentalLinkControl as LinkControl,
} from '@wordpress/block-editor';

import {
	BaseControl,
	Button,
	Disabled,
	PanelBody,
	Placeholder,
	ToggleControl,
} from '@wordpress/components';

import { useEffect } from '@wordpress/element';
import { postList as icon } from '@wordpress/icons';
import { __ } from '@wordpress/i18n';

export default function ( { attributes, setAttributes, clientId } ) {
	const { showThumbnail, showTaxonomy, items: oldItems } = attributes;
	let items = oldItems;
	items = JSON.parse( items );

	useEffect( () => {
		if ( ! attributes.clientId ) {
			setAttributes( { clientId } );
		}
	}, [ clientId ] );

	const onChangeShowThumbnail = ( value ) =>
		setAttributes( {
			showThumbnail: value,
		} );

	const onChangeShowTaxonomy = ( value ) =>
		setAttributes( {
			showTasonomy: value,
		} );

	const onclickNewItemButton = () => {
		items.push( {
			id: 0,
			title: '',
			url: '',
		} );
		setAttributes( { items: JSON.stringify( items ) } );
	};

	const realItems = items.filter( ( item ) => !! item.id && 0 < item.id );

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={ __(
						'Block Settings',
						'inc2734-wp-awesome-widgets'
					) }
				>
					<ToggleControl
						label={ __(
							'Display thumbnail',
							'inc2734-wp-awesome-widgets'
						) }
						checked={ showThumbnail }
						onChange={ onChangeShowThumbnail }
					/>

					<ToggleControl
						label={ __(
							'Display taxonomy',
							'inc2734-wp-awesome-widgets'
						) }
						checked={ showTaxonomy }
						onChange={ onChangeShowTaxonomy }
					/>

					<BaseControl
						label={ __(
							'Search post',
							'inc2734-wp-awesome-widgets'
						) }
						id={ `wp-awesome-widgets/ranking/linkcontrol` }
						className="wp-awesome-widgests-posts-list-linkcontrols"
					>
						{ items.map( ( item, index ) => {
							const onClickRemoveButton = () => {
								items.splice( index, 1 );
								setAttributes( {
									items: JSON.stringify( items ),
								} );
							};

							const onChangeLinkControl = ( nextValue ) => {
								items[ index ] = {
									id: nextValue.id,
									title: nextValue.title,
									url: nextValue.url,
								};
								setAttributes( {
									items: JSON.stringify( items ),
								} );
							};

							return (
								<div
									className="wp-awesome-widgests-posts-list-linkcontrols__item"
									key={ `item-${ index }` }
								>
									<div className="wp-awesome-widgests-posts-list-linkcontrol">
										<span className="wp-awesome-widgests-posts-list-linkcontrol__label">
											{ index + 1 }
										</span>
										<Button
											isSecondary
											isSmall
											onClick={ onClickRemoveButton }
											aria-label={ __(
												'Remove this item',
												'inc2734-wp-awesome-widgets'
											) }
											className="wp-awesome-widgests-posts-list-linkcontrol__remove-button"
										>
											-
										</Button>

										<LinkControl
											settings={ [] }
											value={ {
												url: item.url,
												title: item.title,
											} }
											onChange={ onChangeLinkControl }
										/>
									</div>
								</div>
							);
						} ) }

						<div className="wp-awesome-widgests-posts-list-linkcontrols__action">
							<Button isPrimary onClick={ onclickNewItemButton }>
								{ __(
									'Add new item',
									'inc2734-wp-awesome-widgets'
								) }
							</Button>
						</div>
					</BaseControl>
				</PanelBody>
			</InspectorControls>

			{ 1 > realItems.length ? (
				<Placeholder
					icon={ icon }
					label={ __( 'Ranking', 'inc2734-wp-awesome-widgets' ) }
				>
					{ __( 'No posts found.', 'inc2734-wp-awesome-widgts' ) }
				</Placeholder>
			) : (
				<Disabled>
					<ServerSideRender
						block="wp-awesome-widgets/ranking"
						attributes={ attributes }
					/>
				</Disabled>
			) }
		</>
	);
}
