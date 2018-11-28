
<?php /* Template Name: home-page */ ?>

<?php
get_header(); ?>

    <?php
    $query = new WP_Query( array( 'post_type' => 'Home-blocks','posts_per_page' => '') );
    if ($query->have_posts()) : while ( $query->have_posts()) : $query->the_post(); $i++;?>

        <?php $blok = $i % 2;?>
        <?php if($blok != 0){ ?>
            <div class="main-row main-row-<?php echo $i;?> relative" style="background:url(<?php the_post_thumbnail_url();?>);">
                <div class="main-img"></div>
                <div class="main-text relative flex">
                    <h3 class="relative underlined"><?php the_title();?></h3>
                    <p><?php the_content();?></p>
                </div>
            </div>
        <?php } else {?>
            <div class="main-row main-row-<?php echo $i;?> relative" style="background:url(<?php the_post_thumbnail_url();?>);">
                <div class="main-text relative flex align-right"style="align-items: flex-end;">
                    <h3 class="relative underlined"><?php the_title();?></h3>
                    <p><?php the_content();?></p>
                </div>
                <div class="main-img"></div>
            </div>
        <?php }?>

    <?php endwhile;?>
    <? else:?>
        <?php echo 'baner is not exists';?>
    <?php endif;?>




<div class="menu align-center">
    <h2 class="relative underlined">Menu</h2>
    <h3>Delicious Food &amp; Drinks</h3>
    <div class="partners-area">
        <div class="partners-slider">
            <div class="owl-carousel owl-theme">
                <?php
                $query = new WP_Query( array( 'post_type' => 'menu','posts_per_page' => '') );
                if ($query->have_posts()) : while ( $query->have_posts()) : $query->the_post(); ?>
                    <div class="item">
                        <a href="javascript:void(0);">
                            <img src="<?php the_post_thumbnail_url();?>" alt="" title="">
                            <span class="absolute flex">  <?php the_title();?></span>
                        </a>
                    </div>
                <?php endwhile;?>
                <? else:?>
                    <?php echo 'slider is not exists';?>
                <?php endif;?>
            </div>
        </div>
    </div>
    <a href="javascript:void(0);" class="btn">Ons volledige menu</a>
</div>
</div>

<?php get_footer(); ?>

