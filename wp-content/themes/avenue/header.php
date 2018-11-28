<?php wp_head(); ?>

<body <?php body_class();?>>

<div class="wrapper">
    <div class="top-section">
        <div class="top-links flex">
            <div class="top-links-left">
                Via media 1 (aan Kinepolis Hasselt), 3500 Hasselt
                <span>|</span>
                +32 (0)11 75 34 35
                <span>|</span>
                <a href="#" class="fa fa-facebook-f"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
            <div class="top-links-right uppercase">
                <strong>ma</strong> |
                <strong>di</strong> |
                <strong>wo</strong> |
                <strong>do</strong> |
                <strong>zo</strong>
                <span>- van 11u00 tot 24u00,</span>
                <strong>vrij</strong> |
                <strong>za</strong>
                <span>- van 11u00 tot 02u00</span>
            </div>
        </div>
        <div class="top-navigation flex">
            <div class="logo"><a href="/" class="block"><img src="<?php bloginfo('template_url');?>/assets/images/logo.png" alt="5th Avenue" title="5th Avenue"></a></div>
                <input type="checkbox" id="open-burger-menu">
                <label for="open-burger-menu" class="burger-menu-icon absolute">
                    <em class="relative block"></em>
                    <em class="relative block"></em>
                    <em class="relative block"></em>
                </label>


                <?php wp_nav_menu( array(
                    'theme_location'  => 'header_menu',
                    'menu'            => '',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'flex',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => '',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => new Nav_Footer_Walker(),
                ) ); ?>
        </div>
    </div>

    <?php

    $menu_url =true;
    if (!is_front_page())
        $menu_url = false;
     ?>

    <?php
    $r= stristr(get_the_post_thumbnail_url(), 'menu');
    $post = get_post( $id );

    $data = array(
        $post->post_content,
        $post->post_excerpt
    );

    ;?>
        <?php if(get_the_post_thumbnail_url() && $menu_url!= false) {?>

            <div class="header-section align-center flex relative" style="background: url(<?php the_post_thumbnail_url();?>);background-attachment: fixed;">
                <h1 class="relative underlined"><?php the_post_thumbnail_caption();?></h1>
                <h4><?php  echo  $data[0];?></h4>
                <a href="javascript:void();" class="btn absolute">reserveer online</a>
            </div>
        <?php } if($r== false && $menu_url== false) { ?>
            <div class="header">
                <div class="header-bg-cover" style="background: url(<?php the_post_thumbnail_url();?>);">
                    <div class="menu-header flex relative">
                        <h2><?php the_post_thumbnail_caption();?></h2>
                        <h1 style="color: #FFF;"><?php the_title();?></h1>
                        <a href="/assets/files/menu.pdf" class="absolute" target="_blank"><span>Download menu</span></a>
                    </div>
                </div>
            </div>


        <?php } ?>
