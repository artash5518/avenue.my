<footer>
    <div class="widget-area">
        <div class="container flex uppercase">
            <div>
                <img src="<?php bloginfo('template_url');?>/assets/images/footer-logo.png" alt="5th Avenue" title="5th Avenue" class="footer-logo">
                <p class="txt">U kan er niet naast kijken. Rechts onder aan de trap, vóór u Kinepolis Hasselt betreedt, vindt u <span>"5th avenue"</span>. Een trendy ingerichte brasserie - restaurant en loungezaak. Patrick en Yassina zullen u hier met de beste zorgen omringen</p>
                <p class="social">
                    <a href="javascript:void(0);" class="fa fa-facebook-f"></a>
                    <a href="javascript:void(0);" class="fa fa-instagram"></a>
                </p>
            </div>
            <div>
                <?php wp_nav_menu( array(
                    'theme_location'  => 'footer_menu',
                    'menu'            => '',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'bottom-menu',
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
            <div>
                <strong>contact</strong>
                <p>Via Media 1 - 3500 Hasselt<br>(aan Kinepolis Hasselt)</p>
                <p>TEL +32 (0)11 75 34 35<br><a href="mailto:info@5th-avenue.be">info@5th-avenue.be</a></p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2514.675814641662!2d5.366687915459883!3d50.92971367954432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c121a79f6b3565%3A0xa8d30efa7c4aba50!2zVmlhIE1lZGlhIDEsIDM1MDAgSGFzc2VsdCwg0JHQtdC70YzQs9C40Y8!5e0!3m2!1sru!2s!4v1531921634921" width="100%" height="185" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div>
                <strong>openingsuren</strong>
                <p>ma | di | wo | do | zo<br>van 11u00 tot 24u00</p>
                <p>vrij | za<br>van 11u00 tot 02u00</p>
                <br><br>
                <p>Gratis ruime parking</p>
            </div>
            <div class="align-center">
                <p><img src="<?php bloginfo('template_url');?>/assets/images/partners/partner-logo-2.png" alt=""></p>
                <p><img src="<?php bloginfo('template_url');?>/assets/images/partners/partner-logo-3.png" alt=""></p>
            </div>
        </div>
    </div>

    <div class="footer uppercase">
        <div class="container flex">
            <div class="privacy-policy">
                2018 5th Avenue. All rights reserved.
            </div>
            <div>Design by ARGOSOFT.BE</div>
        </div>
    </div>

</footer>

</body>
<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            margin: 35,
            nav: true,
            loop: true,

            autoplay:true,
            autoplayTimeout:3000,

            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                667: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1200: {
                    items: 2
                },
                1400: {
                    items: 3
                },
                1600: {
                    items: 3
                }
            }
        });


    });
</script>