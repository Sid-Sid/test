<?php get_header(); ?>
<?php
    $lay_set = $alka_set['404_layout'];
?>
		<div id="middle" class="container">
			<div class="white">
                    <header class="page-header">
					    <h1><strong>Oops</strong>, This Page Could Not Be Found!</h1>
				    </header>
            <?php if ($lay_set == 2 || $lay_set == 3) : ?>
				<div class="row <?php echo ($lay_set == 2 ? ' has_left_sidebar' : ' has_right_sidebar'); ?>">

                    <div class="col-md-9 <?php echo ($lay_set == 2 ? ' col-md-push-3' : ''); ?>">
            <?php endif; ?>
        				<article id="post-0" class="post error404 no-results not-found">
        					<div class="entry-content">
                                <p>
        							We're sorry, but the page you were looking for doesn't exist.
        						</p>
               					<hr class="half-margins invisible" />
        						<div class="e404">404</div>
        					</div><!-- .entry-content -->
        				</article><!-- #post -->
            <?php if ($lay_set == 2 || $lay_set == 3) : ?>
                    </div>

					<aside class="col-md-3<?php echo ($lay_set == 2 ? ' col-md-pull-9' : ''); ?>">
                        <?php get_sidebar(); ?>
					</aside>

				</div>
            <?php endif; ?>
			</div>
		</div>

<?php get_footer(); ?>