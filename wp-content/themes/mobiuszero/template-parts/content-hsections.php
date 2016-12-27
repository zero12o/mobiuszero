<?php
/**
 * Template part for displaying the about page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * 
 * @package mobiusZero
 */

?>
<section id="<?php echo esc_attr( $post->post_name ); ?>" class="<?php echo esc_attr( $post->post_name ); ?> module content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>