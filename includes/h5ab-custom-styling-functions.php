<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function h5ab_custom_styling_site() {

    $allowedHTML = wp_kses_allowed_html( 'post' );

    $wholeSiteExternal = ( isset ( $_POST['h5ab-whole-site-custom-external'] ) ) ? $_POST['h5ab-whole-site-custom-external'] : null;
    $wholeSiteExternal = str_replace("'",'"',$wholeSiteExternal);

    $wholeSiteStyling = ( isset ( $_POST['h5ab-whole-site-custom-styling'] ) ) ? $_POST['h5ab-whole-site-custom-styling'] : null;

    $wholeSiteExternalKSES = wp_kses(stripslashes($wholeSiteExternal), H5AB_Custom_Styling::$h5ab_custom_styling_kses);
    $wholeSiteStylingKSES = wp_kses(stripslashes($wholeSiteStyling), $allowedHTML);

    $updatedExternal = update_option( 'h5abCustomExternal', $wholeSiteExternalKSES);
	$updatedStyling = update_option( 'h5abCustomStyling', $wholeSiteStylingKSES);

    $success = (($updatedExternal || $updatedStyling) || ($updatedExternal && $updatedStyling)) ? true : false;
    $message= ($success) ? 'Settings successfully saved' : 'Settings could not be saved';

    $response = array('success' => $success, 'message' => esc_attr($message));

    return $response;

}

?>
