<?php get_header();?>

<div class="menu align-center cont">
<div class="main">
    <div class="content-menu-area">
        <ul class="menu-dishes flex">
<!--            get menues-->
            <?php $query = new WP_Query( array( 'post_type' => 'menu' ) );?>

            <?php while ( $query->have_posts() ) {
                $query->the_post();?>
                    <li class="active">

                        <a class="" href="<?php echo get_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url();?>" alt="TAPAS/KLEINE HONGER" title="TAPAS/KLEINE HONGER">
                            <span> <?php the_title();?></span> 
                        </a>
                    </li>
           <?php } ?>
        </ul>
            <?php
            if ( have_posts() ) { while ( have_posts() ){ the_post(); ?>
                    <h2><?php the_title();?><?php echo get_the_ID();?></h2>
            <?php  } ?>
            <?php  } ?>

            <?php $test = wp_get_post_categories( $post->ID, array('fields' => 'all') );?>
            <?php  foreach ($test as $cat):
                $post_id_7 = get_post( $cat->term_id );
                $title = $post_id_7->post_title;
                $query = new WP_Query( array(
                    'cat'     => $cat->term_id ,
                    'post_type' => 'product_menu',
                ) );
                ?>
                <?php if(!empty($query->posts)):?>
                    <div class="menu-dishes-pricelist">
                        <h2><?php echo $cat->name;?></h2>
                            <ul>
                               <?php foreach ($query->posts as $product):?>
                                   <li class="flex">
                                                <span title="Scampi’s in licht pikante saus">
                                                    <em> <?php   echo $product->post_title;?></em>
                                                </span>
                                       <strong>€ <?php  echo get_post_meta($product->ID,'pri',true);?></strong>
                                   </li>
                                <?php endforeach;?>
                            </ul>
                    </div>
                <?php endif;?>
            <?php endforeach;?>




    </div>
    </div>




</div>
<?php get_footer();?>
