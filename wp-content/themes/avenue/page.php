<?php get_header();?>
<!--<div class="menu align-center">-->
<!--            --><?php
//            if ( have_posts() ) :while ( have_posts() ) : the_post();?>
<!---->
<!--                    <h1 style="color: #FFF;">--><?php //the_title();?><!--</h1>-->
<!---->
<!---->
<!--            --><?php //endwhile;?>
<!--            --><?php // endif; ?>

<!--</div>-->

<div class="main">
    <div class="container">

        <?php
        $query = new WP_Query( array( 'post_type' => 'over_ons','posts_per_page' => '') );$i=0;
        if ($query->have_posts()) : while ( $query->have_posts()) : $query->the_post(); $i++; ?>
            <?php $block_class = $i % 2;
            if($block_class!=0):?>
                <div class="main-row">
                    <div class="main-img">
                        <div class="space-slider">
                            <div class="swiper-container gallery-top" id="gallery-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" style="background-image:url(<?php the_post_thumbnail_url();?>)"></div>
                                </div>
                            </div>
                            <div class="swiper-pagination" id="swiper-pagination-1"></div>
                        </div>
                    </div>
                    <div class="main-text">
                        <h3 class="relative underlined">Eindelijk,<?php the_title();?></h3>
                       <?php the_content();?>
                    </div>
                </div>
            <? else:?>
                <div class="main-row middle-row">
                    <div class="main-text align-right">
                        <h3 class="relative underlined"><?php the_title();?></h3>
                        <?php the_content();?>
                    </div>
                    <div class="main-img">
                        <div class="space-slider">
                            <div class="swiper-container gallery-top" id="gallery-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" style="background-image:url(/uploads/over_ons/3wq7umxq1ase2qr4124n3vjlu.jpg)"></div>
                                </div>
                            </div>
                            <div class="swiper-pagination" id="swiper-pagination-2"></div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        <?php endwhile;?>
        <? else:?>
            <?php echo 'slider is not exists';?>
        <?php endif;?>


    </div>
</div>
<?php get_footer();?>
