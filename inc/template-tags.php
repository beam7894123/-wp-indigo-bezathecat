<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wp-indigo
 */



if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;


if ( ! function_exists( 'wp_indigo_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function wp_indigo_posted_by( $wp_indigo_is_echo = true) {

		/* translators: %s: post author. */
		$byline = sprintf(
			'<span class="byline"><span class="author vcard"><a class="c-single__author__link h6 url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> ' . esc_html(get_the_author()) . ' </a></span></span>'
		);

		if($wp_indigo_is_echo === true){
			echo  wp_kses_post( $byline ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		else{
			return wp_kses_post( $byline ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

	}
endif;



if ( ! function_exists( 'wp_indigo_get_custom_category' ) ) :
	/**
	 * Get category lists
	 *
	 */

	function wp_indigo_get_custom_category($wp_indigo_seprator = " ", $wp_indigo_custom_class = "c-post__cat", $wp_indigo_is_limited = false) {

		if( ! empty( get_the_category() ) ){
			/* get category */
			$categories = get_the_category();
			$separator = $wp_indigo_seprator;
			$output = '';
			$category_counter = 0;

			if ( ! empty( $categories ) ) {

				foreach( $categories as $category ) {

					if( $wp_indigo_is_limited === true && $category_counter === 3){
						break;
					}

					$category_counter++;
					/* translators: used between list items, there is a space after the comma */
					$output .= '<a class="'.esc_attr(  $wp_indigo_custom_class ).'" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'wp-indigo' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . esc_html($separator);
				}
				echo  wp_kses_post(trim( $output, $separator ));
			}
		}

	}
endif;


if (! function_exists('wp_indigo_get_default_pagination')) :
	/**
	* Show numeric pagination
	*/
	function wp_indigo_get_default_pagination( $wp_indigo_class_name = "" ) {
		echo'<div class="c-pagination '.esc_attr( $wp_indigo_class_name  ).' ">' . wp_kses_post(
			paginate_links(
				array(
				'prev_text'          => __( 'Previous', 'wp-indigo' ),
				'next_text'          => __( 'Next', 'wp-indigo' ),
				)
			)) .'</div>';
	}
endif;


if ( ! function_exists( 'wp_indigo_share_links' ) ) {
	/**
	  * Display Share icons
	  */
	function wp_indigo_share_links( $wp_indigo_share_title = true ) {
		if ( get_theme_mod( 'show_share_icons', true ) ) {

			$wp_indigo_linkedin_url = "https://www.linkedin.com/shareArticle?mini=true&url=" . get_permalink() . "&title=" . get_the_title();
			$wp_indigo_twitter_url  = "https://twitter.com/intent/tweet?url=" . get_permalink() . "&title=" . get_the_title();
			$wp_indigo_facebook_url = "https://www.facebook.com/sharer.php?u=" . get_permalink();


			if($wp_indigo_share_title){
				echo sprintf('<span class="c-social-share__title h6 u-letter-space-regular">%s</span>', esc_html__( 'Share on:' , 'wp-indigo' ));
			}

			echo '<div class="c-social-share__items">';
			echo sprintf( '<a class="c-social-share__item" target="_blank" href="%s"><span class="dashicons dashicons-facebook-alt c-social-share__item__icon"></span></a>', esc_url( $wp_indigo_facebook_url ) );
			echo sprintf( '<a class="c-social-share__item" target="_blank" href="%s"><span class="dashicons dashicons-twitter c-social-share__item__icon"></span></a>', esc_url( $wp_indigo_twitter_url ) );
			echo sprintf( '<a class="c-social-share__item" target="_blank" href="%s"><span class="dashicons dashicons-linkedin c-social-share__item__icon"></span></a>', esc_url( $wp_indigo_linkedin_url ) );
			echo '</div>';

		}
	}
}


if ( ! function_exists( 'wp_indigo_socials_links' ) ) :
	/**
	  * Display Social Networks 
	  * (ADD New Social Networks Icon HERE!)
	  */
	function wp_indigo_socials_links() {

		$wp_indigo_facebook  		=  get_theme_mod( 'facebook', "" );
		$wp_indigo_twitter   		=  get_theme_mod( 'twitter', "" );
		$wp_indigo_instagram 		=  get_theme_mod( 'instagram', "" );
		$wp_indigo_linkedin  		=  get_theme_mod( 'linkedin', "" );
		$wp_indigo_github    		=  get_theme_mod( 'github', "" );
		$wp_indigo_mail   			=  get_theme_mod( 'mail', "" );
		$wp_indigo_pinterest    	=  get_theme_mod( 'pinterest', "" );
		$wp_indigo_youtube    		=  get_theme_mod( 'youtube', "" );
		$wp_indigo_spotify    		=  get_theme_mod( 'spotify', "" );
		$wp_indigo_gitlab    		=  get_theme_mod( 'gitlab', "" );
		$wp_indigo_lastfm    		=  get_theme_mod( 'lastfm', "" );
		$wp_indigo_stackoverflow    =  get_theme_mod( 'stackoverflow', "" );
		$wp_indigo_quora    		=  get_theme_mod( 'quora', "" );
		$wp_indigo_reddit    		=  get_theme_mod( 'reddit', "" );
		$wp_indigo_medium    		=  get_theme_mod( 'medium', "" );
		$wp_indigo_vimeo    		=  get_theme_mod( 'vimeo', "" );
		$wp_indigo_lanyrd    		=  get_theme_mod( 'lanyrd', "" );
		$wp_indigo_dribbble    		=  get_theme_mod( 'dribbble', "" );
		$wp_indigo_behance    		=  get_theme_mod( 'behance', "" );
		$wp_indigo_telegram    		=  get_theme_mod( 'telegram', "" );
		$wp_indigo_codepen    		=  get_theme_mod( 'codepen', "" );
		$wp_indigo_buymeacoffee    	=  get_theme_mod( 'buymeacoffee', "" );
        $wp_indigo_bskyapp  	    =  get_theme_mod( 'bskyapp', "" );


		// If variable was not empty will display the icons 
		// (ADD New Social Networks Icon HERE!)
		$wp_indigo_social_variables  = array($wp_indigo_facebook,$wp_indigo_twitter,$wp_indigo_instagram,$wp_indigo_linkedin,$wp_indigo_github,
		$wp_indigo_mail, $wp_indigo_pinterest ,$wp_indigo_youtube ,$wp_indigo_spotify , $wp_indigo_gitlab,$wp_indigo_lastfm ,$wp_indigo_stackoverflow ,$wp_indigo_quora ,$wp_indigo_reddit ,$wp_indigo_medium ,
		$wp_indigo_vimeo, $wp_indigo_lanyrd,$wp_indigo_dribbble ,$wp_indigo_behance,$wp_indigo_telegram,$wp_indigo_codepen,$wp_indigo_buymeacoffee,$wp_indigo_bskyapp
		) ;

		// Check if one of the variables are not empty
		$wp_indigo_social_variable_flag = 0;
		foreach($wp_indigo_social_variables as $wp_indigo_social){
			if( !empty($wp_indigo_social)){
				$wp_indigo_social_variable_flag = 1;
				break;
			}
		}

		// Display the icons here 
		//(ADD New Social Networks Icon HERE!)
		if( $wp_indigo_social_variable_flag === 1 ) {

			echo '<div class="c-social-share c-social-share--footer">';

			if ( $wp_indigo_facebook ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon dashicons dashicons-facebook-alt"></span></a>', esc_url( $wp_indigo_facebook ), esc_html__( 'Facebook', 'wp-indigo' ) );
			}

			if ( $wp_indigo_twitter ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon dashicons dashicons-twitter"></span></a>', esc_url( $wp_indigo_twitter ), esc_html__( 'Twitter', 'wp-indigo' ) );
			}

			if ( $wp_indigo_instagram ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon dashicons dashicons-instagram"></span></a>', esc_url( $wp_indigo_instagram ), esc_html__( 'Instagram', 'wp-indigo' ) );
			}

			if ( $wp_indigo_linkedin ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon dashicons dashicons-linkedin"></span></a>', esc_url( $wp_indigo_linkedin ), esc_html__( 'Linkedin', 'wp-indigo' ) );
			}

			if ( $wp_indigo_github ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="ant-design:github-filled" data-inline="false"></span></a>', esc_url( $wp_indigo_github ), esc_html__( 'Github', 'wp-indigo' ) );
			}

			if ( $wp_indigo_mail ) {
				echo sprintf( '<a href="mailto:%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="ant-design:mail-outlined" data-inline="false"></span></a>', esc_attr(sanitize_email( $wp_indigo_mail)), esc_html__( 'Mail', 'wp-indigo' ) );
			}

			if ( $wp_indigo_pinterest ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="bx:bxl-pinterest" data-inline="false"></span></a>', esc_url( $wp_indigo_pinterest ), esc_html__( 'pinterest', 'wp-indigo' ) );
			}

			if ( $wp_indigo_youtube ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="akar-icons:youtube-fill" data-inline="false"></span></a>', esc_url( $wp_indigo_youtube ), esc_html__( 'youtube', 'wp-indigo' ) );
			}

			if ( $wp_indigo_spotify ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="bx:bxl-spotify" data-inline="false"></span></a>', esc_url( $wp_indigo_spotify ), esc_html__( 'spotify', 'wp-indigo' ) );
			}

			if ( $wp_indigo_lastfm ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="brandico:lastfm-rect" data-inline="false"></span></a>', esc_url( $wp_indigo_lastfm ), esc_html__( 'lastfm', 'wp-indigo' ) );
			}

			if ( $wp_indigo_gitlab ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="ion:logo-gitlab" data-inline="false"></span></a>', esc_url( $wp_indigo_gitlab ), esc_html__( 'gitlab', 'wp-indigo' ) );
			}

			if ( $wp_indigo_stackoverflow ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="cib:stackoverflow" data-inline="false"></span></a>', esc_url( $wp_indigo_stackoverflow ), esc_html__( 'stackoverflow', 'wp-indigo' ) );
			}

			if ( $wp_indigo_reddit ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="akar-icons:reddit-fill" data-inline="false"></span></a>', esc_url( $wp_indigo_reddit ), esc_html__( 'reddit', 'wp-indigo' ) );
			}

			if ( $wp_indigo_quora ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="bx:bxl-quora" data-inline="false"></span></a>', esc_url( $wp_indigo_quora ), esc_html__( 'quora', 'wp-indigo' ) );
			}

			if ( $wp_indigo_medium ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="ant-design:medium-circle-filled" data-inline="false"></span></a>', esc_url( $wp_indigo_medium ), esc_html__( 'medium', 'wp-indigo' ) );
			}

			if ( $wp_indigo_vimeo ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="brandico:vimeo-rect" data-inline="false"></span></a>', esc_url( $wp_indigo_vimeo ), esc_html__( 'vimeo', 'wp-indigo' ) );
			}

			if ( $wp_indigo_dribbble ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="akar-icons:dribbble-fill" data-inline="false"></span></a>', esc_url( $wp_indigo_dribbble ), esc_html__( 'dribbble', 'wp-indigo' ) );
			}

			if ( $wp_indigo_behance ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="ant-design:behance-outlined" data-inline="false"></span></a>', esc_url( $wp_indigo_behance ), esc_html__( 'behance', 'wp-indigo' ) );
			}

			if ( $wp_indigo_lanyrd ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="cib:lanyrd" data-inline="false"></span></a>', esc_url( $wp_indigo_lanyrd ), esc_html__( 'lanyrd', 'wp-indigo' ) );
			}

			if ( $wp_indigo_telegram ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="bx:bxl-telegram"  data-inline="false"></span></a>', esc_url( $wp_indigo_telegram ), esc_html__( 'Telegram', 'wp-indigo' ) );
			}
			
			if ( $wp_indigo_codepen ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="akar-icons:codepen-fill" data-inline="false"></span></a>', esc_url( $wp_indigo_codepen ), esc_html__( 'Codepen', 'wp-indigo' ) );
			}

			if ( $wp_indigo_buymeacoffee ) {
				echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><span class=" c-social-share__icon iconify" data-icon="bx:coffee-togo" data-inline="false"></span></a>', esc_url( $wp_indigo_buymeacoffee ), esc_html__( 'buymeacoffee', 'wp-indigo' ) );
			}

            if ( $wp_indigo_bskyapp ) {
                echo sprintf( '<a href="%s" aria-label="%s" class="c-social-share__item" target="_blank"><svg width="1em" height="1em" version="1.1" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="linearGradient6708" x1=".20507" x2="14.922" y1="7.3462" y2="7.3462" gradientTransform="matrix(1.1282 0 0 1.1282 -1.0439 -15.781)" gradientUnits="userSpaceOnUse"><stop stop-color="#0062fe" offset="0"/><stop stop-color="#008efe" offset="1"/></linearGradient><linearGradient id="linearGradient7805" x1=".20507" x2="14.922" y1="7.3462" y2="7.3462" gradientTransform="matrix(1.1282 0 0 1.1282 -1.0439 -15.781)" gradientUnits="userSpaceOnUse"><stop stop-opacity="0" offset="0"/><stop stop-opacity="0" offset="1"/></linearGradient><linearGradient id="linearGradient10521" x1="1.7721" x2="13.393" y1="7.6018" y2="7.6018" gradientTransform="matrix(2.2255 0 0 2.2255 -15.762 -1.2102)" gradientUnits="userSpaceOnUse"><stop stop-opacity=".5" offset="0"/><stop stop-opacity="0" offset="1"/></linearGradient></defs><path d="m7.303 0.04a0.5 0.5 0 0 1 0.394 0l6.803 2.916-7 3-7-3zm-7.303 3.79v7.67c0 0.2 0.12 0.38 0.303 0.46l6.697 2.87v-8zm8 3 7-3v7.67a0.5 0.5 0 0 1-0.303 0.46l-6.697 2.87z" display="none" fill="currentColor"/><rect transform="rotate(90)" x=".017542" y="-14.964" width="14.942" height="14.942" rx="3.3205" fill="url(#linearGradient6708)" stroke="url(#linearGradient7805)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6603"/><path d="m11.145 10.626v0.68059c0 6.8536-5.1997 14.708-14.714 14.708-2.8108 0-5.5604-0.80991-7.9085-2.348 0.40836 0.05446 0.81671 0.08168 1.2319 0.07489 2.3276 0 4.594-0.76907 6.4248-2.2051a5.1473 5.1473 0 0 1-4.8322-3.6004c0.31988 0.06805 0.65337 0.10208 0.98005 0.10208 0.4628 0 0.9188-0.06125 1.3612-0.18376a5.1548 5.1548 0 0 1-4.1448-5.0704v-0.06805c0.71462 0.40155 1.5177 0.61934 2.3412 0.63976a5.1324 5.1324 0 0 1-1.6266-6.8468c2.6271 3.2328 6.5065 5.1997 10.672 5.4039a4.3422 4.3422 0 0 1-0.14292-1.1842 5.1358 5.1358 0 0 1 4.9479-5.3222c1.5245-0.054452 2.9946 0.5717 4.0155 1.7083 1.157-0.2314 2.2664-0.66017 3.2873-1.2591a5.2093 5.2093 0 0 1-2.3072 2.9061c1.0277-0.14292 2.0282-0.42877 2.9742-0.85755-0.6874 1.0549-1.5518 1.9737-2.559 2.7224zm-5.7102-0.054452 1.7015-1.7083m-1.7015 0 1.7015 1.7083" fill="url(#linearGradient10521)" stroke="#f9f9f9" stroke-linecap="round" stroke-linejoin="round" stroke-opacity=".49635" stroke-width=".68059"/></svg></a>', esc_url( $wp_indigo_bskyapp ), esc_html__( 'bskyapp', 'wp-indigo' ) );
            }

			echo '</div>';
		}
	}
endif;



if (! function_exists('wp_indigo_get_home_section_close_tag')) :
	/**
	 * Add close tag depend on page
	 */
	function wp_indigo_get_home_section_close_tag() {
		if ( is_page_template( 'page-template/home.php' || is_404() ) ) {
			echo "</section>";
		}
		else{
			return;
		}
	}
endif;


if (! function_exists('wp_indigo_portfolios_get_class_name')) :
	/**
	 * Add class depend on page in single protfolios page
	 */
	function wp_indigo_portfolios_get_class_name() {
		if ( 'portfolios' == get_post_type() ) {
			echo esc_attr( "c-main--single-portfolios" );
		}
	}
endif;


if ( ! function_exists( 'wp_indigo_taxonomy_filter' ) ) :
	/**
	 *  Return taxonomy filter with (active class)
	 */
	function wp_indigo_taxonomy_filter( $wp_indigo_className = "" ,  $wp_indigo_getSeparator = ", " , $wp_indigo_is_limited = false ,  $wp_indigo_taxonomy = "category" , $wp_indigo_hard_limit = false ) {

		global $wp_query;

		$taxonomies = get_terms( array(
			'taxonomy' 	 => $wp_indigo_taxonomy,
			'hide_empty' => false
		) );

		$taxonomny_counter = 0;
		$separator = $wp_indigo_getSeparator;

		$wp_indigo_all_active_class = "";
		if(empty($wp_query->query['portfolio_category'])){
			$wp_indigo_all_active_class = "active";
		}

		echo '<a class="'.esc_attr( $wp_indigo_className ).' '.esc_attr( $wp_indigo_all_active_class ).'" href='.esc_url(site_url().'/'.get_post_type()).'>';
	    esc_html_e( 'All ', 'wp-indigo' );
		echo '</a>';

		if ( !empty($taxonomies) ) {
			$output = '';

			foreach( $taxonomies as $category ) {

				if($wp_indigo_is_limited === true && $taxonomny_counter === 4 || $wp_indigo_hard_limit === true && $taxonomny_counter === 1){
					break;
				}

				if(!empty($wp_query->query['portfolio_category'])){
					$current_category = $wp_query->query['portfolio_category'];
				}
				if($category != null && !empty($wp_query->query['portfolio_category'])  && $category->slug  === $current_category){
					$classactive = "active";
				}
				else{
					$classactive = "";
				}

				$taxonomny_counter++;

				if ($category->count != 0) {
					/* translators: return poject_category items for filtering */
					$output .= '<a class="'.esc_attr($wp_indigo_className). ' ' .esc_attr( $classactive ).'" href="'. esc_url( site_url() . '/'. get_post_type().'/?'.$wp_indigo_taxonomy.'=' . esc_html( $category->slug ) ). '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'wp-indigo' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . esc_html($separator);
				}
			}
			echo wp_kses_post(trim( $output , $separator ));
		}
	}
endif;


if ( ! function_exists( 'wp_indigo_category_filter' ) ) :
	/**
	  *  Return Category filter
	  */
	function wp_indigo_category_filter( $wp_indigo_className = "" ) {
		$categories = get_categories();

		global $wp_query;
		global $wp;

		$wp_indigo_all_active_class = "";

		if(empty($wp_query->query['category_name'])){
			$wp_indigo_all_active_class = "active";
		}

		$wp_indigo_current_url =  home_url( $wp->request );

		if(get_theme_mod( 'blog_category_style', 'list' ) === 'dropdown' ) {

			get_template_part( 'template-parts/components/categories-list' );

		}else{

			echo sprintf('<a class="%s %s" href="%s">%s</a>', esc_attr($wp_indigo_all_active_class),  esc_attr($wp_indigo_className), esc_url($wp_indigo_current_url) , esc_html__( 'All', 'wp-indigo' ) );

			foreach($categories as $category) {
				$classactive = "";
				// Check not empty
				if(!empty($wp_query->query['category_name'])){
					// get current category
					$current_category = $wp_query->query['category_name'];
				}
				// Check if current category match with url (and add active class)
				if($category != null && !empty($wp_query->query['category_name'])  && $category->slug == $current_category) {
					$classactive = "active";
				}
				// The output
				echo '<a class="'.esc_attr( $wp_indigo_className.' '.$classactive ).'" href="' . esc_attr($wp_indigo_current_url) . '/?category_name=' . esc_attr( $category->slug ) . '">' . esc_html($category->name) . '</a>';
			}
		}

	}
endif;


if ( ! function_exists( 'wp_indigo_get_taxonomy' ) ) :
    /**
	  *
	  * Display Post Tags (Custom taxonomy)
      */
    function wp_indigo_get_taxonomy( $wp_indigo_taxonomy_name = "" , $wp_indigo_class_name = "" , $wp_indigo_tag_name = "span" ) {
        $wp_indigo_custom_taxs = get_the_terms( get_the_ID(), $wp_indigo_taxonomy_name );

		$wp_indigo_output = "";

        if (is_array($wp_indigo_custom_taxs) && !empty($wp_indigo_custom_taxs)) {
            if( !empty( $wp_indigo_taxonomy_name ) ){
                foreach ( $wp_indigo_custom_taxs as $wp_indigo_custom_tax ) {
                    $wp_indigo_output .=  '<'. esc_html($wp_indigo_tag_name) .' class="'.esc_attr(  $wp_indigo_class_name  ).' " href="'.esc_url( get_tag_link( $wp_indigo_custom_tax->term_id ) ).'">' . esc_html( $wp_indigo_custom_tax->name ). '</'. esc_html($wp_indigo_tag_name) .'> ';

                }
				echo wp_kses_post($wp_indigo_output);
            }
        }
    }
endif;


if ( ! function_exists( 'wp_indigo_branding' ) ) :
	/**
	 * Display Custom logo if exist otherwise show site title
	 */
	function wp_indigo_branding() {

		if( has_custom_logo() ) {
			the_custom_logo();
		}
		else{
			/** trnslator %s: link address, translator %s 2: Site title  */
			echo sprintf('<h1 class="c-header__title site-title"><a href="%s" rel="home">%s</a></h1>',esc_url( home_url( '/' ) ), esc_html(get_bloginfo( 'name' )));
		}

	}

endif;


if (! function_exists('wp_indigo_get_archives_class')) :
	/**
	  * Get archive class
	  */
	function wp_indigo_get_archives_class() {
		if ( 'portfolios' == get_post_type() ) {
			echo esc_attr( 'c-main--portfolios' );
		}
	}
endif;


if ( ! function_exists('wp_indigo_get_post_tags')) :
	/**
	  * Get Post tags
	  */
	function wp_indigo_get_post_tags( $wp_indigo_class_name = "") {
		$wp_indigo_post_tags = get_the_tags();
            if ($wp_indigo_post_tags) {
            foreach($wp_indigo_post_tags as $wp_indigo_post_tag) {

				/* translator 1: %s class name , translator 2: %s post tag link, translator 3: %s aria label, translator 4: %s the content of a element ,     */
				echo sprintf('<a class="%s" href="%s" aria-label="%s" >%s</a>' , esc_attr( $wp_indigo_class_name ) ,esc_url( get_tag_link( $wp_indigo_post_tag->term_id ) ) , esc_attr( $wp_indigo_post_tag->name ) , esc_html( $wp_indigo_post_tag->name ) );

            }
        }
	}
endif;


if ( ! function_exists('wp_indigo_is_footer_widget_active')) :
	/**
	  * Get Footer Classes
	  */
	function wp_indigo_is_footer_widget_active( $wp_indigo_is_class = true ) {

			if($wp_indigo_is_class){

				if(is_active_sidebar( 'footer-widget' )) {

					if( get_theme_mod( 'footer_style' , 'two-widget') == 'one-widget' ) {
						echo esc_attr( ' c-footer__site-info--wide ' );
					}
					elseif( get_theme_mod( 'footer_style' , 'two-widget') == 'two-widget' ) {
						echo esc_attr( ' c-footer__site-info--extra-wide ' );
					}
					else{
						echo esc_attr( '' );
					}
				}
			}
			else{

				if(is_active_sidebar( 'footer-widget' )) {

					wp_indigo_get_footer_widget();

				}

			}
	}
endif;


if ( ! function_exists('wp_indigo_get_footer_widget')) :
	/**
	  * Get footer widget
	  */
	function wp_indigo_get_footer_widget() {
		/** translator %s: Display footer widgets */
		echo sprintf('<div class="c-footer__widgets"><div id="header-widget-area" class="c-footer__widget widget-area" role="complementary">%s</div></div>' , wp_kses_post(dynamic_sidebar( 'footer-widget' )) );
	}
endif;


if ( ! function_exists('wp_indigo_get_footer_menu')) :
	/**
	  * Get Footer menu
	  */
	function wp_indigo_get_footer_menu( $wp_indigo_menu_name_slug = "" ) {

		if ( has_nav_menu( $wp_indigo_menu_name_slug ) ) {

			$wp_indigo_menu_name = $wp_indigo_menu_name_slug;

			if ( ( $wp_indigo_locations = get_nav_menu_locations() ) && isset( $wp_indigo_locations[ $wp_indigo_menu_name ] ) ) {
				$wp_indigo_menu = wp_get_nav_menu_object( $wp_indigo_locations[ $wp_indigo_menu_name ] );

				$wp_indigo_menu_items = wp_get_nav_menu_items($wp_indigo_menu->term_id);

				$wp_indigo_menu_list = "";

				foreach ( (array) $wp_indigo_menu_items as $key => $menu_item ) {
					$title = $menu_item->title;
					$url = $menu_item->url;
					$wp_indigo_menu_list .= '<a class="c-footer__link c-footer__link--nav" href="' . esc_url($url) . '">' . esc_html($title) . '</a>';
				}
			}
			echo wp_kses_post($wp_indigo_menu_list);

		}

	}
endif;


if ( ! function_exists('wp_indigo_get_fade_in_animation')) :
	/**
	  * Get fade in Up Animation from kirki ( Handled by css using BEM )
	  */
	function wp_indigo_get_fade_in_animation($wp_indigo_animation_delay = true) {
		if( get_theme_mod( 'fade_in_animation', true ) ){
			echo esc_attr( " u-has-fadein-animation " );
			if($wp_indigo_animation_delay === false){
				echo esc_attr( " u-has-fadein-animation-delay " );
			}
		}
	}
endif;


if ( ! function_exists('wp_indigo_get_fade_in_down_animation')) :
	/**
	  * Get fade in Down Animation from kirki ( Handled by css using BEM )
	  */
	function wp_indigo_get_fade_in_down_animation( ) {

		if( get_theme_mod( 'fade_in_animation', true ) ){
			echo esc_attr( " u-has-fadeinDown-animation " );

		}
	}
endif;


if ( ! function_exists('wp_indigo_get_fade_in_up_animation')) :
	/**
	  * Get fade in Up Animation from kirki ( Handled by css using BEM )
	  */
	function wp_indigo_get_fade_in_up_animation() {

		if( get_theme_mod( 'fade_in_animation', true ) ){
			echo esc_attr( " u-has-fadeinUp-animation " );
		}
	}
endif;


if ( ! function_exists('wp_indigo_get_profile_image')) :
	/**
	  * Get Profile image
	  */
	function wp_indigo_get_profile_image() {

		$wp_indigo_image = wp_get_attachment_image_src(get_theme_mod( 'profile_image' )["id"] , 'thumbnail');

		/** translator %s: image src, translator %s 2: image srcset */
		echo sprintf('<img alt="%s" src="%s" />', esc_attr__( 'Profile image' , 'wp-indigo' ) ,esc_attr($wp_indigo_image[0]) );

	}
endif;


if ( ! function_exists('wp_indigo_get_portfolios_style')) :
	/**
	  * Get Portfolios page Grid style
	  */
	function wp_indigo_get_portfolios_style() {

		if( get_theme_mod( 'portfolios_item_style' , 'masonry') == 'masonry' ) {
			return esc_attr( 'c-main__portfolios--masonry' );
		}
		else{
			return esc_attr( 'c-main__portfolios--normal' );
		}

	}
endif;


if ( ! function_exists( 'wp_indigo_get_index_title' ) ) :
	/**
	  * Get index.php Title
	  */
	function wp_indigo_get_index_title() {
		if (is_home()) {
			if (get_option('page_for_posts')) {
				echo esc_html(get_the_title(get_option('page_for_posts')));
			}
			else{
				echo esc_html__( "Blog" , "wp-indigo" );
			}
		}
	}

endif;


if ( ! function_exists( 'wp_indigo_get_sidebar_class' ) ) :
	/**
	  * Get Sidebar class
	  */
	function wp_indigo_get_sidebar_class() {

		if(is_active_sidebar( 'wp-indigo-primary-sidebar' )) {
			if(get_theme_mod( 'sidebar_display' ,true )) {
				echo esc_attr( ' c-main--wide ' );
			}
		}
	}

endif;


if ( ! function_exists( 'wp_indigo_get_footer_menu_class' ) ) :
	/**
	  * Get Sidebar class
	  */
	function wp_indigo_get_footer_menu_class() {

		if( get_theme_mod( 'footer_menu_pos' , 'center') == 'top' ) {
			echo esc_attr( 'c-footer__copy--top' );
		}
		elseif( get_theme_mod( 'footer_menu_pos' , 'center') == 'bottom'  ){
			echo esc_attr( 'c-footer__copy--bottom' );
		}
		else { 
			echo esc_attr( 'c-footer__copy--normal' );
		}

	}
endif;


if ( ! function_exists( 'wp_indigo_get_entry_meta_class' ) ) :
	/**
	  * Get Entry Meta class
	  */
	function wp_indigo_get_entry_meta_class() {

		if( get_theme_mod( 'blog_date_alignment' , 'front_title') == 'front_category' ) {
			echo esc_attr( 'c-post__entry-meta--right' );
		}
		elseif( get_theme_mod( 'blog_date_alignment' , 'front_title') == 'front_title'  ){
			echo esc_attr( 'c-post__entry-meta--bottom' );
		}
	}
endif;


if ( ! function_exists( 'wp_indigo_get_date_class' ) ) :
	/**
	  * Get Entry Meta class
	  */
	function wp_indigo_get_date_class() {

		if( get_theme_mod( 'blog_date_alignment' , 'front_title') == 'front_category' && get_theme_mod( 'archives_posts_category', true ) === false ) {
			echo esc_attr( 'c-post__date--full-width' );
		}
		
	}
endif;


if ( ! function_exists( 'wp_indigo_show_categories' ) ) :

	function wp_indigo_show_categories() {
			if( get_theme_mod('show_single_cat' , true) ){

				$categories_list = get_the_category_list( esc_html__( ', ', 'wp-indigo' ) );
				if ( $categories_list ) {/* translators: 1: list of categories. */
					printf( '<span class="c-single__cats__list h6">%s</span>',
						$categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
		}
	}
endif;


if ( ! function_exists( 'wp_indigo_show_post_nav' ) ) :

	function wp_indigo_show_post_nav() {
		 the_post_navigation(
			array(
				'prev_text' => '
				<div class="c-single__nav">
					<div class="c-single__nav-context">
						<span class="c-single__nav-title h2">%title</span>
						<div class="c-single__nav-meta">
							<div class="c-single__nav-author"><span class="h6">'.wp_indigo_posted_by(false).'</span></div>
							<div class="c-single__nav-date h5"><span class="h6">'.get_the_date().'</span></div>
						</div>
					</div>
				</div>',

				'next_text' => '
				<div class="c-single__nav c-single__nav--right">
					<div class="c-single__nav-context">
						<span class="c-single__nav-title h2">%title</span>
						<div class="c-single__nav-meta">
						<div class="c-single__nav-author"><span class="h6">'.wp_indigo_posted_by(false).'</span></div>
						<div class="c-single__nav-date h5"><span class="h6">'.get_the_date().'</span></div>
						</div>
					</div>
				  
				</div>',
			)
		);
	}
endif;