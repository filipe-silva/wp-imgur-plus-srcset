<?php
/**
* Plugin Name: WP Imgur Plus SrcSet
* Description: Overrides the URL attribute when setting the srcset, to the imgur URL instead of the "local" URL.
* Version: 1.0
* Author: Filipe Silva
**/

/*
 * Force URLs in srcset attributes into HTTPS scheme.
 * This is particularly useful when you're running a Flexible SSL frontend like Cloudflare
 */
function url_srcset( $sources, $size_array, $image_src) {
		
  foreach ( $sources as &$source ) {
	$source['url'] = $image_src;
    $source['url'] = set_url_scheme( $source['url'], 'https' );
  }

  return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'url_srcset', 10, 3 );