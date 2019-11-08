<?php
if ( ! is_front_page() ) :
	if ( function_exists( 'yoast_breadcrumb' ) ) :
		yoast_breadcrumb( '<div class="breadcrumbs-wrap"><div class="container"><div class="breadcrumbs">', '</div></div></div>' );
	endif;
endif;
