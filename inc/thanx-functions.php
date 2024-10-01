<?php
/**
 * These are functions imported from the previous theme.
 */

function thanx_mig_add_custom_sitemap_items() {
	global $wpseo_sitemaps;
	$date = $wpseo_sitemaps->get_last_modified( 'thanx-academy' );

	$sitemap_custom_items = '
		<sitemap>
		<loc>' . site_url() . '/wp-content/uploads/sitemap-custom-thanx-academy.xml</loc>
		<lastmod>' . htmlspecialchars( $date ) . '</lastmod>
		</sitemap>';

	return $sitemap_custom_items;
}
add_filter( 'wpseo_sitemap_index', 'thanx_mig_add_custom_sitemap_items' );



/**
 * Custom RSS size.
 *
 * @param [type] $default
 * @return void
 */
function thanx_mig_thumbnail_size_for_rss( $default ) {
	return 'thumbnail';
}
add_filter( 'rfi_rss_image_size', 'thanx_mig_thumbnail_size_for_rss', 10, 1 );


// all actions related to emojis
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );





function thanx_mig_register_custom_image_size( $sizes ) {
	return array_merge(
		$sizes,
		array(
			'featured-content-thumbnail' => __( 'Featured Content Thumbnail' ),
		)
	);
}
add_filter( 'image_size_names_choose', 'thanx_mig_register_custom_image_size' );



function thanx_mig_custom_cf7_select_validation_filter( $result, $tag ) {
	if ( 'pod-Howcanwehelp' == $tag->name ) {
		$value = isset( $_POST['pod-Howcanwehelp'] ) ? trim( $_POST['pod-Howcanwehelp'] ) : '';
		if ( ! strlen( $value ) > 0 ) {
			$result->invalidate( $tag, 'Please select a reason' );
		}
	}
	return $result;
}
add_filter( 'wpcf7_validate_select*', 'thanx_mig_custom_cf7_select_validation_filter', 1, 2 );



function thanx_mig_custom_cf7_text_validation_filter( $result, $tag ) {
	if ( 'pod-your-name' == $tag->name ) {
		$value = isset( $_POST['pod-your-name'] ) ? trim( $_POST['pod-your-name'] ) : '';
		if ( ! strlen( $value ) > 0 ) {
			$result->invalidate( $tag, 'Please enter your name' );
		}
	}
	return $result;
}
add_filter( 'wpcf7_validate_text*', 'thanx_mig_custom_cf7_text_validation_filter', 1, 2 );




function thanx_mig_custom_cf7_email_validation_filter( $result, $tag ) {
	if ( 'pod-your-email' == $tag->name ) {
		$value = isset( $_POST['pod-your-email'] ) ? trim( $_POST['pod-your-email'] ) : '';
		if ( ! strlen( $value ) > 0 ) {
			$result->invalidate( $tag, 'Please provide a valid email address' );
		}
	}
	if ( in_array( 'class:domainBlock', $tag->options ) ) {
		$domainList = array(
			'gmail.com',
			'yahoo.com',
			'hotmail.com',
			'msn.com',
			'icloud.com',
			'outlook.com',
		);
		$email      = $_POST[ $tag->name ];
		$dirty      = false;

		for ( $d = 0; $d < count( $domainList ); $d++ ) {
			if ( strstr( $email, $domainList[ $d ] ) ) {
				$dirty = true;
			}
		}

		if ( $dirty ) {
			$result->invalidate( $tag, 'Please use your company email address' );
		}
	}
	return $result;
}
add_filter( 'wpcf7_validate_email*', 'thanx_mig_custom_cf7_email_validation_filter', 1, 2 );




function thanx_mig_custom_cf7_textarea_validation_filter( $result, $tag ) {
	if ( 'pod-your-message' == $tag->name ) {
		$value = isset( $_POST['pod-your-message'] ) ? trim( $_POST['pod-your-message'] ) : '';
		if ( ! strlen( $value ) > 0 ) {
			$result->invalidate( $tag, 'Please provide details' );
		}
	}
	return $result;
}
add_filter( 'wpcf7_validate_textarea*', 'thanx_mig_custom_cf7_textarea_validation_filter', 1, 2 );




function thanx_autopilot_track() {
	if ( ! wp_verify_nonce( $_POST['nonce'], 'autopilot_nonce' ) ) {
		exit( 'No naughty business please' );
	}

	$ap = new autopilot();
	if ( isset( $_POST['url'] ) && isset( $_POST['sessionId'] ) ) {
		$ap->recordPageVisit(
			array(
				'sessionId' => $_POST['sessionId'],
				'url'       => $_POST['url'],
			)
		);
	}
}
add_action( 'wp_ajax_autopilot_track', 'thanx_autopilot_track' );
add_action( 'wp_ajax_nopriv_autopilot_track', 'thanx_autopilot_track' );


function thanx_autopilot_submit() {
	if ( ! wp_verify_nonce( $_POST['nonce'], 'autopilot_nonce' ) ) {
		exit( 'No naughty business please' );
	}

	unset( $_POST['enable-autopilot'], $_POST['check-alive'], $_POST['action'], $_POST['nonce'] );

	if ( isset( $_POST['list-id'] ) ) {
		$listId = $_POST['list-id'];
		unset( $_POST['list-id'] );
	}

	if ( isset( $_POST['trigger-id'] ) ) {
		$triggerId = $_POST['trigger-id'];
		unset( $_POST['trigger-id'] );
	}

	$ap = new autopilot();
	/* Associate Session */
	if ( isset( $_POST['email-address'] ) && isset( $_POST['sessionId'] ) ) {
		$ap->associateSession(
			array(
				'sessionId' => stripslashes( $_POST['sessionId'] ),
				'email'     => stripslashes( $_POST['email-address'] ),
			)
		);
	}
	$contact_data = array(
		'contact' => array(),
	);
	if ( isset( $_POST['first-name'] ) ) {
		$contact_data['contact']['FirstName'] = stripslashes( $_POST['first-name'] );
		unset( $_POST['first-name'] );}
	if ( isset( $_POST['last-name'] ) ) {
		$contact_data['contact']['LastName'] = stripslashes( $_POST['last-name'] );
		unset( $_POST['last-name'] );}
	if ( isset( $_POST['email-address'] ) ) {
		$contact_data['contact']['Email'] = stripslashes( $_POST['email-address'] );
		unset( $_POST['email-address'] );}
	if ( isset( $_POST['company-name'] ) ) {
		$contact_data['contact']['Company'] = stripslashes( $_POST['company-name'] );
		unset( $_POST['company-name'] );}
	if ( isset( $_POST['phone'] ) ) {
		$contact_data['contact']['Phone'] = stripslashes( $_POST['phone'] );
		unset( $_POST['phone'] );}

	foreach ( $_POST as $key => $value ) {
		$contact_data['contact']['custom'][ 'string--Contact--' . ucwords( str_replace( '-', '--', $key ) ) ] = stripslashes( $value );
	}

	/* ADD CONTACT AND THEN ADD TO LIST */

	if ( isset( $triggerId ) ) {
		echo 'Adding contact and to Trigger';
		$response = $ap->addContactToJourney( $triggerId, $contact_data );
		die( $response );
	} elseif ( isset( $listId ) ) {
		echo 'Adding contact to List';
		$contact    = $ap->addContact( $contact_data ); // {"contact_id":"person_A62CE3A5-9331-4B11-973C-6C1AB3CF84DB"}
		$contactObj = json_decode( $contact );
		if ( property_exists( $contactObj, 'contact_id' ) ) {
			$response = $ap->addContactToList( $listId, $contactObj->contact_id );
			die( $response );
		} else {
			echo 'Finished';
			die();
		}
	} else {
		echo 'Finished';
		die();
	}
}

add_action( 'wp_ajax_autopilot', 'thanx_autopilot_submit' );
add_action( 'wp_ajax_nopriv_autopilot', 'thanx_autopilot_submit' );

