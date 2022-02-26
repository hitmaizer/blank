<?php
/* Template Name: User Projects */

get_header();
$username = wp_get_current_user()->user_firstname;
$current_user = wp_get_current_user();
$status = get_field("status", "user_" . $current_user->ID);



?>

<!--  Projects HTML -----> 




<?php 
get_footer();