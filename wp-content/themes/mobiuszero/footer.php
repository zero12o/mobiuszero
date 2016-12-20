<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mobiusZero
 */ 

?>

    </main> <!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="site-info">
                        <?php bloginfo("name"); echo " &copy; "; echo date('Y'); ?>
                    </p>    
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
