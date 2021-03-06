<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eightythreec
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            while (have_posts()) :
                the_post(); ?>
                <div class="container-fluid text-center"
                     style="background-image: url(<?php echo get_template_directory_uri() . '/img/section1.png' ?>)">
                    <div class="container">
                        <div class="col-sm-12">
                            <div class="center-block">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; // End of the loop.

            $bigText = get_post_meta($post->ID, 'Big Text', false);
            $iAm = get_post_meta($post->ID, 'I am', true);
            $paragraph = get_post_meta($post->ID, 'Paragraph', false);
            $background = get_post_meta($post->ID, 'Background', false);
            for ($x = 0; $x < count($bigText); $x++) { ?>
                <div class="container-fluid traits" id="section-<?php echo $x; ?>"
                     style="background-image: url(<?php echo get_template_directory_uri() . '/img/' . $background[$x] ?>)">
                    <div class="container">
                        <div class="col-sm-12 col-md-7">
                            <div class="vert-center">
                                <span>
								<?php echo $iAm; ?>
							</span>
                                <h2><?php echo $bigText[$x]; ?></h2>
                                <p>
                                    <?php echo $paragraph[$x]; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div id="scroll-bullets">
                <ul>
            <?php for ($x = 0; $x < count($bigText); $x++) { ?>
                        <li>
                            <a href="#section-<?php echo $x;?>">
                                <span class="text">
                                    <?php echo $bigText[$x]; ?>
                                </span>
                                <span class="circle"></span>
                            </a>
                        </li>
            <?php } ?>
                </ul>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
