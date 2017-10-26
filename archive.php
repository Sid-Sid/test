<?php get_header(); ?>
<?php
    $lay_set = $alka_set['archive_layout'];
?>
		<div id="middle" class="container">
			<div class="white">

				<header class="page-header">
					<h1><?php
					if ( is_day() ) :
						printf('Daily Archives: %s', '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( 'Monthly Archives: %s', '<span>' . get_the_date( 'F Y' ) . '</span>' );
					elseif ( is_year() ) :
						printf('Yearly Archives: %s', '<span>' . get_the_date( 'Y' ) . '</span>' );
					else :
						echo ( 'Archives' );
					endif;
				?></h1>
				</header>
            <?php if ($lay_set == 1) : ?>
				<div id="blog">
            <?php elseif ($lay_set == 2 || $lay_set == 3) : ?>
				<div id="blog" class="row <?php echo ($lay_set == 2 ? ' has_left_sidebar' : ' has_right_sidebar'); ?>">

                    <div class="col-md-9  <?php echo ($lay_set == 2 ? ' col-md-push-3' : ''); ?>">
            <?php endif; ?>
                    <?php while ( have_posts() ) : the_post(); ?>
					<!-- blog item -->
					<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>

						<!-- article title -->
						<div class="item-title">
							<h2><a href="<?php the_permalink() ?>"><?php the_title (); ?></a></h2>
                            <?php  if (has_post_format('video')) echo '<span class="label label-default light"><i class="fa fa-film"> </i></span>'; ?>
                            <?php  if (has_post_format('audio')) echo '<span class="label label-default light"><i class="fa fa-headphones"> </i></span>'; ?>
                            <?php  if (has_post_format('gallery')) echo '<span class="label label-default light"><i class="fa fa-picture-o"> </i></span>'; ?>
                            <span class="label label-default light"><?php the_date(); ?></span>
                            <?php echo alka_post_categories (); ?>
							<a href="<?php the_permalink() ?>#comments" class="label label-default light"><i class="fa fa-comment-o"></i> <?php comments_number('NO Comments', '1 Comment', '% Comments'); ?></a>

						</div>

                        <?php  if (has_post_format('video')) : ?>
                        <div class="row">
                            <div class="col-md-9">
                                <?php get_template_part('single', 'video'); ?>
                            </div>
                            <div class="col-md-3">
    						    <!-- blog short preview -->
    						    <?php alka_excerpt (40); ?>
                                <!-- read more button -->
						        <br><a href="<?php the_permalink() ?>" class="btn btn-xs"><i class="fa fa-sign-out"></i> READ MORE</a>
                            </div>
                        </div>
                        <?php elseif (has_post_format('audio')) : ?>
                        <div class="row">
                            <div class="col-md-9">
                                <?php get_template_part('single', 'audio'); ?>
                            </div>
                            <div class="col-md-3">
    						    <!-- blog short preview -->
    						    <?php alka_excerpt (20); ?>
                                <!-- read more button -->
						        <br><a href="<?php the_permalink() ?>" class="btn btn-xs"><i class="fa fa-sign-out"></i> READ MORE</a>
                            </div>
                        </div>
                        <?php elseif (has_post_format('gallery')) : ?>
                        <div class="row">
                            <div class="col-md-9">
                                <?php get_template_part('single', 'carusel'); ?>
                            </div>
                            <div class="col-md-3">
    						    <!-- blog short preview -->
    						    <?php alka_excerpt (40); ?>
                                <!-- read more button -->
						        <br><a href="<?php the_permalink() ?>" class="btn btn-xs"><i class="fa fa-sign-out"></i> READ MORE</a>
                            </div>
                        </div>
                        <?php else : ?>
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="row">
                                <div class="col-md-9">
            						<figure>
            							<?php the_post_thumbnail('post-thumbnail','class=img-responsive'); ?>
            						</figure>
                                </div>
                                <div class="col-md-3">
        						    <!-- blog short preview -->
        						    <?php alka_excerpt (20); ?>
                                    <!-- read more button -->
    						        <br><a href="<?php the_permalink() ?>" class="btn btn-xs"><i class="fa fa-sign-out"></i> READ MORE</a>
                                </div>
                            </div>
                            <?php else : ?>
        						    <!-- blog short preview -->
        						    <?php alka_excerpt (60); ?>
                                    <!-- read more button -->
    						        <br><a href="<?php the_permalink() ?>" class="btn btn-xs"><i class="fa fa-sign-out"></i> READ MORE</a>
                            <?php endif; ?>
                        <?php endif; ?>
					</article>
					<!-- /blog item -->
                    <?php endwhile; ?>
					<!-- PAGINATION -->
                    <div class="text-center">
                        <?php echo alka_pagenavi(); ?>
                    </div>
					<!-- /PAGINATION -->
            <?php if ($lay_set == 1) : ?>
                </div><!-- #blog -->
            <?php elseif ($lay_set == 2 || $lay_set == 3) : ?>
                   </div>

					<aside class="col-md-3 <?php echo ($lay_set == 2 ? ' col-md-pull-9' : ''); ?>">
                        <?php get_sidebar (); ?>
					</aside>
				</div>

            <?php endif; ?>

            </div><!-- .white -->
        </div><!-- #middle -->

<?php get_footer(); ?>