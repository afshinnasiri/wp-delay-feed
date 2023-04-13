<?php
function myfeed_delay( $param ) {
 
    global $wpdb;
 
    if ( is_feed() ) {
        // Time format
        $today = gmdate( 'Y-m-d H:i:s' );
   
        $delay = '1'; 
        $unit = 'HOUR'; // select unit: MINUTE, HOUR, DAY, WEEK, MONTH, YEAR.
        $param .= " AND TIMESTAMPDIFF($unit, $wpdb->posts.post_date_gmt, '$today') > $delay ";
    }
    return $param;
}
add_filter( 'posts_where', 'wpb_snippet_publish_later_on_feed' );
?>
