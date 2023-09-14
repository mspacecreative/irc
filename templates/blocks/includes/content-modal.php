<?php
$content = get_sub_field('content');
if ( $content ) {
	echo '
	<div class="modal_container" tabindex="-1" role="dialog" aria-hidden="false">
		<div class="modal_table">
			<div class="modal_table_cell">
				<div class="modal_inner">
					<button class="closeModalButton">
						<span></span>
						<span></span>
					</button>
					<div class="modal-content">' 
						. $content . '
					</div>
				</div>
			</div>
		</div>
	</div>';
}