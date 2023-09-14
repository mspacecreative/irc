<?php if( have_rows('cta_button') ): ?>
<?php while( have_rows('cta_button') ): the_row(); ?>
	<?php if ( get_sub_field('button_link') ): ?>
	<footer>
		
		<ul class="actions center-items">
			<li>
				<a href="<?php the_sub_field('button_link'); ?>" class="dark button"><?php the_sub_field('button_label'); ?></a>
			</li>
		</ul>
		
	</footer>
	<?php elseif ( get_sub_field('external_link') ): ?>
	<footer>
		
		<ul class="actions center-items">
			<li>
				<a href="<?php the_sub_field('external_link'); ?>" class="dark button" target="_blank"><?php the_sub_field('button_label'); ?></a>
			</li>
		</ul>
		
	</footer>
	<?php elseif ( get_sub_field('anchor_link') ): ?>
	<footer>
		
		<ul class="actions center-items">
			<li>
				<a href="#<?php the_sub_field('anchor_link'); ?>" class="dark button"><?php the_sub_field('button_label'); ?></a>
			</li>
		</ul>
		
	</footer>
	<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>