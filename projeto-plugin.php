<?php

/*
Plugin Name: Posts Relations
Plugin URI: http://localhost
Description: Posts relacionados com wordpress
Author: Vinicius Gularte Martin
Version: 1.0
Author URI: https://www.linkedin.com/in/viniciusgularte/

*/
function paginacaoFunction($atts){
  $related_args = array(

    'post_type' =>'post',
    'post__not_in' => array(get_the_ID()),
    'posts_per_page' => 2
  );
  // The Query
  $posts = new WP_Query( $related_args );

  // The Loop
  if ( $posts->have_posts() ) {
  $html = '<ul>';
  	while ( $posts>have_posts() ) {
  		$posts->the_post();
  		$html .= '<li>' . get_the_title() . '</li>';
  	}
  	$html .= '</ul>';
  	/* Restore original Post Data */
  	wp_reset_postdata();
  }
  return $html;
}
add_shortcode('paginacao','paginacaoFunction');
