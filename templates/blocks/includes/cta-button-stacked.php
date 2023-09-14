<?php
if ( have_rows('cta_links') ):
	while ( have_rows('cta_links') ): the_row();	
		
		if ( have_rows('cta_link') ):
			while ( have_rows('cta_link') ): the_row();
			$linklabel = get_sub_field('label');
			$exturl = get_sub_field('url');
			$pagelink = get_sub_field('page');
			$pdf = get_sub_field('pdf');
			$linktype = get_sub_field('link_type');
								
			if ( $linktype == 'internal' ) {
				echo '<p><a class="button dark" href="' . $pagelink . '">' . $linklabel . '</a></p>';
			} elseif ( $linktype == 'external' ) {
				echo '<p><a class="button dark" href="' . $exturl . '" target="_blank">' . $linklabel . '</a></p>';
			} elseif ( $linktype == 'pdf' ) {
				echo '<p><a class="pdf_dl" href="' . $pdf . '" target="_blank">' . $linklabel . '</a></p>';
			}
				
		endwhile;
		endif;
	
	endwhile;
endif;