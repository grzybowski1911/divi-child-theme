<?php 

$youtube = get_option('youtube_link');
$linkedin = get_option('linkedin_link');
$seak = get_option('seak_link');
$houzz = get_option('houzz_link');
$pin = get_option('pin_link');
$linktree = get_option('linktree_link');

?>
<ul class="et-social-icons">

<?php if ( 'on' === et_get_option( 'divi_show_facebook_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-facebook">
		<a href="<?php echo esc_url( et_get_option( 'divi_facebook_url', '#' ) ); ?>" target="_blank" class="icon">
			<span><?php esc_html_e( 'Facebook', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php if ( 'on' === et_get_option( 'divi_show_twitter_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-twitter">
		<a href="<?php echo esc_url( et_get_option( 'divi_twitter_url', '#' ) ); ?>" target="_blank" class="icon">
			<span><?php esc_html_e( 'Twitter', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php if ( $linkedin ) { ?>
	<li class="et-social-icon et-social-linkedin">
		<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" class="icon">
			<i class="fa fa-linkedin et-social-icon" aria-hidden="true"></i>
		</a>
	</li>
<?php } ?>
<?php if ( $linktree ) { ?>
	<li class="et-social-icon et-social-linkedin">
		<a href="<?php echo esc_url( $linktree ); ?>" target="_blank" class="icon">
			<i class="fa fa-link et-social-icon" aria-hidden="true"></i>
		</a>
	</li>
<?php } ?>
<?php if ( $pin ) { ?>
	<li class="et-social-icon">
		<a href="<?php echo esc_url( $pin ); ?>" target="_blank" class="icon">
			<i class="fa fa-pinterest et-social-icon" aria-hidden="true"></i>
		</a>
	</li>
<?php } ?>
<?php if ( $houzz ) { ?>
	<li class="et-social-icon">
		<a href="<?php echo esc_url( $houzz ); ?>" target="_blank" class="icon">
				<i class="fa fa-houzz et-social-icon" aria-hidden="true"></i>
			</a>
	</li>
<?php } ?>
<?php if ( $seak ) { ?>
	<li class="et-social-icon">
		<a href="<?php echo esc_url( $seak ); ?>" target="_blank" class="icon">
				<i class="fa fa-user-md et-social-icon" aria-hidden="true"></i>
			</a>
	</li>
<?php } ?>
<?php if ( $youtube ) { ?>
	<li class="et-social-icon et-social-youtube">
		<a href="<?php echo esc_url( $youtube ); ?>" target="_blank" class="icon">
			<span><?php esc_html_e( 'Youtube', 'Divi' ); ?></span>
		</a>
	</li>
<?php } ?>
<?php if ( 'on' === et_get_option( 'divi_show_google_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-google-plus">
		<a href="<?php echo esc_url( et_get_option( 'divi_google_url', '#' ) ); ?>" target="_blank" class="icon">
			<span><?php esc_html_e( 'Google', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php $et_instagram_default = ( true === et_divi_is_fresh_install() ) ? 'on' : 'false'; ?>
<?php if ( 'on' === et_get_option( 'divi_show_instagram_icon', $et_instagram_default ) ) : ?>
	<li class="et-social-icon et-social-instagram">
		<a href="<?php echo esc_url( et_get_option( 'divi_instagram_url', '#' ) ); ?>" target="_blank" class="icon">
			<span><?php esc_html_e( 'Instagram', 'Divi' ); ?></span>
		</a>
	</li>

<?php endif; ?>
<?php if ( 'on' === et_get_option( 'divi_show_rss_icon', 'on' ) ) : ?>
<?php
	$et_rss_url = '' !== et_get_option( 'divi_rss_url' )
		? et_get_option( 'divi_rss_url' )
		: get_bloginfo( 'rss2_url' );
?>
	<li class="et-social-icon et-social-rss">
		<a href="<?php echo esc_url( $et_rss_url ); ?>" target="_blank" class="icon">
			<span><?php esc_html_e( 'RSS', 'Divi' ); ?></span>
		</a>
	</li>
	<?php endif; ?>

</ul>