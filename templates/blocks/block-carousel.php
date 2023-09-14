<section class="section">
    <div class="inner_container">
        <?php
        if (have_rows('slides')) {
            echo
            '<div class="carousel">';
            while (have_rows('slides')) {
                the_row();
                $slide_content = get_sub_field('content');
                echo
                '<div>' . $slide_content . '</div>';
            }
            echo
            '</div>';
        } ?>
    </div>
</section>