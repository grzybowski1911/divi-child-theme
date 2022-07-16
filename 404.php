<?php get_header(); ?>
<?php $name_var = get_query_var('name');  ?>

 
<div id="main-content">
    <div class="container">
        <div id="content-area" class="clearfix">
            <div id="left-area">
                <article id="post-0" <?php post_class( 'et_pb_post not_found' ); ?>>
                    <h1><?php esc_html_e('Page /','Divi'); echo $name_var;  esc_html_e('/ Not Found','Divi'); ?></h1>
                    <p><?php esc_html_e('Whoops. Looks like the page you were looking for doesn\'t exit. Maybe try searching for something else using the search bar above', 'Divi'); ?></p>
                </article> <!-- .et_pb_post -->
            </div> <!-- #left-area -->
 
            <?php get_sidebar(); ?>
        </div> <!-- #content-area -->
    </div> <!-- .container -->
</div> <!-- #main-content -->
 
<?php get_footer(); ?>

<?php dynamic_sidebar( '404' ); ?>




