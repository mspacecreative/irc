<?php
if ( have_rows('cta_link') ):
	while ( have_rows('cta_link') ): the_row();
	$linklabel = get_sub_field('label');
	$exturl = get_sub_field('url');
	$pagelink = get_sub_field('page');
	$pdf = get_sub_field('pdf');
	$linktype = get_sub_field('link_type'); 
						
	if ( $linktype == 'internal' && $linklabel ) {
		echo '<a class="button light" href="' . $pagelink . '">' . $linklabel . '</a>';
	} elseif ( $linktype == 'internal' ) {
		echo '<a class="button light" href="' . $pagelink . '">Learn more</a>';
	} elseif ( $linktype == 'external' && $linklabel ) {
		echo '<a class="button light" href="' . $exturl . '" target="_blank">' . $linklabel . '</a>';
	} elseif ( $linktype == 'external' ) {
		echo '<a class="button light" href="' . $exturl . '" target="_blank">Learn more</a>';
	} elseif ( $linktype == 'pdf' && $linklabel ) {
		echo '<a class="pdf_dl" href="' . $pdf . '" target="_blank">' . $linklabel . '</a>';
	} elseif ( $linktype == 'pdf' ) {
		echo '<a class="pdf_dl" href="' . $pdf . '" target="_blank">Download PDF</a>';
	}
		
	endwhile;
endif;