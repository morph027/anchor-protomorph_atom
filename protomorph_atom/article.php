<?php theme_include('header'); ?>

	<article class="article" id="article-<?php echo article_id(); ?>">

		<h1>
			<?php echo article_title(); ?>
		</h1>

                <?php $featuredimage = article_custom_field('featured-image'); ?>
                <?php if(!empty($featuredimage)): ?>
                  <div class="featured-image">
                    <img src="<?php echo $featuredimage; ?>" alt="<?php echo article_title(); ?>" />
                  </div>
                <?php endif; ?>

		<p class="description">
			<?php echo article_description(); ?>
		</p>

		<div id="<?php echo article_slug(); ?>">
		<?php echo article_markdown(); ?>
		</div>

		<footer>
			Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo date('jS F Y', article_time()); ?></time>
			by <?php echo article_author('real_name'); ?>.
			<span>
				<a href="<?php echo article_category_url(); ?>"><?php echo article_category(); ?></a>.
			<?php if(comments_open()): ?>
				<?php echo total_comments() . pluralise(total_comments(), ' comment'); ?>.
			<?php endif; ?>
			</span>
			<?php echo article_custom_field('attribution'); ?>
			<?php if (article_custom_field('tags')) { echo '<br/>Tagged: '; $tagarray = array(); $tagexplode = explode(",", article_custom_field('tags')); foreach ($tagexplode as $taggy) { $tagarray[] = '<a href="'.tagged_url().'/'.$taggy.'">'.$taggy.'</a>'; } echo implode(", ", $tagarray); } ?>
		</footer>
	</article>

	<?php echo article_pager(); ?>

<?php if(comments_open() && has_comments()): ?>
	<?php $i = 0; while(comments()): $i++; ?>
	<div class="comment clearfix" id="comment-<?php echo comment_id(); ?>">
		<span class="avatar">
			<img src="<?php echo comment_avatar(comment_email()); ?>" >
		</span>

		<h3><?php echo comment_name(); ?></h3>

		<p><?php echo comment_text(); ?></p>

		<footer class="clearfix">
			<time datetime="<?php echo date(DATE_W3C, comment_time()); ?>">
				<?php echo date('jS F Y H:i', comment_time()); ?>
			</time>

			<a class="comment-id" href="#comment-<?php echo comment_id(); ?>">#<?php echo $i; ?></a>
		</footer>
	</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php if(comments_open()): ?>
	<form class="comment-form" id="comment" method="post" action="<?php echo comment_form_url(); ?>#comment">
		<?php echo comment_form_notifications(); ?>

		<div class="input-group">
			<?php echo comment_form_input_name('placeholder="Name" class="float-input"'); ?>
			<label class="float-label" for="name">Name</label>
		</div>

		<div class="input-group">
			<?php echo comment_form_input_email('placeholder="Email" class="float-input"'); ?>
			<label class="float-label" for="email">Email</label>
		</div>

		<div class="input-group">
			<?php echo comment_form_input_text('placeholder="Comment" class="float-input"'); ?>
			<label class="float-label" for="text">Comment</label>
		</div>

		<div class="input-group input-group-right">
			<?php echo comment_form_button(); ?>
		</div>
	</form>
<?php endif; ?>

<?php theme_include('footer'); ?>
