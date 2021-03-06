<?php theme_include('header'); ?>

<h1 class="wrap">You searched for items tagged with &ldquo;<?php echo tagged_term(); ?>&rdquo;.</h1>

<?php if(has_tagged_results()): ?>
    <ul class="items">
        <?php $i = 0; while(tagged_results()): $i++; ?>
        <li>
            <article class="wrap">
                <h2>
                    <a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>"><?php echo article_title(); ?></a>
                </h2>
            </article>
        </li>
        <?php endwhile; ?>
    </ul>

    <?php if(has_pagination()): ?>
    <nav class="pagination">
        <div class="wrap">
            <?php echo tagged_prev(); ?>
            <?php echo tagged_next(); ?>
        </div>
    </nav>
    <?php endif; ?>

<?php else: ?>
    <p class="wrap">Unfortunately, there's no results for &ldquo;<?php echo tagged_term(); ?>&rdquo;. Did you spell everything correctly?</p>
<?php endif; ?>

<?php theme_include('footer'); ?>
