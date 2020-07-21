
<?php

$themeid=1;
$th=$db->prepare("select * from `blogtheme` where theme_id=:id");
$th->execute(array('id' => $themeid ));
$bgtheme=$th->fetch(PDO::FETCH_ASSOC);

?>

<style media="screen">
@charset "utf-8";
/* CSS Document */

a,
.theme_color,
.cat-list li a:hover,
.main-header .info-box .icon-box,
.news-block-three .inner-box .image .overlay-box .play-btn:hover,
.fixed-header .sticky-header .logo .letter,
.main-header .logo-outer .logo .letter,
.widget-post a, .widget-post a:hover,
.testimonial-block .inner-box .author span,
.news-block-two .inner-box .lower-box h3 a:hover,
.main-header .header-top .top-right .social-nav li a:hover,
.category-tabs-box .prod-tabs .tab-btns .tab-btn:hover,
.main-footer .tweets-widget .tweet .icon,
.main-footer .tweets-widget .tweet .days,
.category-tabs-box .prod-tabs .tab-btns .tab-btn.active-btn,
.news-block-three .inner-box .image .overlay-box .content h3 a:hover,
.news-block-four .inner-box .content-box h3 a:hover,
.tweet-block .inner-box .tweet-icon,
.accordion-box .block .acc-btn.active .icon-outer,
.main-footer .footer-bottom .logo .letter,
.header-top-three .social-icon li a:hover,
.news-block-one .inner-box .lower-box h3 a:hover,
.news-block-one .inner-box .lower-box .read-more,
.error-section .error-big-text,
.gallery-item .inner-box .text,
.breadcrumb-bar li a:hover,
.blog-single .inner-box .new-article li a:hover,
.author-box .author-comment .inner-box h4,
.social-icon-two li a:hover,
.hidden-bar .logo a .letter,
.shop-comment-form .rating-box .rating a:hover,
.shop-item .inner-box .lower-box .lower-content .price,
.shop-item .inner-box .lower-box .upper-box h4 a:hover,
.shop-page .basic-details .item-price,
.gallery-section .filters .filter.active, .gallery-section .filters .filter:hover,
.news-block-six .inner-box .image-box .image .overlay-box .content h2 a:hover,
.main-footer .footer-bottom .copyright-section .footer-nav li a:hover,
.cart-table tbody tr .remove-btn:hover,
.checkout-page .default-links li a,
.error-search-box .form-group input:focus + button, .error-search-box .form-group button:hover,
.hidden-bar .side-menu ul li a:hover,
.hidden-bar .side-menu ul > li.current > a,
.hidden-bar .side-menu ul > li > ul > li.current > a,
.hidden-bar .side-menu ul.navigation > li > ul > li > a:hover,
.hidden-bar .side-menu ul.navigation > li.active > a{
	color: <?php echo $bgtheme['theme_main']?>;
}

/*Background Color*/
.main-menu .navigation > li > a:before,
.main-menu .navigation > li > ul > li:hover > a,
.main-slider .uranus.tparrows:hover,
.main-slider .uranus.tparrows:hover,
.scroll-to-top:hover,
.btn-style-two:hover,
.sidebar-title h2,
.sec-title-two:after,
.sec-title h2,
.btn-style-one:hover,
.main-slider .slider-content h2:before,
.main-header .language .dropdown-menu > li > a:hover,
.category-tabs-box .prod-tabs .tab-btns .category,
.main-menu .navigation > li > ul > li > ul > li > a:hover,
.main-header .header-top .top-right .english-nav li a:hover,
.main-header .header-top .top-right .english-nav li.active a,
.product-widget-tabs .prod-tabs .tab-btns .tab-btn:hover,
.product-widget-tabs .prod-tabs .tab-btns .tab-btn.active-btn,
.category-tabs-box .prod-tabs .tab-btns .dropdown-category .more-category li a:hover,
.news-block-three .inner-box .image .overlay-box .content .tag,
.blog-carousel-section .owl-dots .owl-dot.active span,
.blog-carousel-section .owl-dots .owl-dot:hover span,
.tweet-widget .owl-dots .owl-dot.active span,
.tweet-widget .owl-dots .owl-dot:hover span,
.header-top-two,
.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.gallery-item .overlay-inner .link,
.popular-tags-two a:hover,
.skill-progress .progress-box .bar .bar-fill,
.gallery-single .upper-content .image-info,
.styled-pagination li a:hover, .styled-pagination li a.active,
.main-slider-two .owl-dots .owl-dot.active span,
.main-slider-two .owl-dots .owl-dot:hover span,
.main-slider-three .owl-dots .owl-dot.active span,
.main-slider-three .owl-dots .owl-dot:hover span,
.main-slider-four .owl-dots .owl-dot.active span,
.main-slider-four .owl-dots .owl-dot:hover span,
.featured-block-section .owl-dots .owl-dot.active span,
.featured-block-section .owl-dots .owl-dot:hover span,
.subscribe-style-one,
.tag-title li,
.btn-style-three:hover,
.comment-form button:hover,
.shop-item .inner-box .off-price,
.social-icon-three li a:hover,
.shop-item .inner-box .lower-box .lower-content .cart-btn,
.comment-box .comment .comment-inner .reply-btn:hover,
.related-item-carousel .owl-nav .owl-next:hover, .related-item-carousel .owl-nav .owl-prev:hover,
.blog-single-slider .owl-nav .owl-prev:hover, .blog-single-slider .owl-nav .owl-next:hover,
.comming-soon .emailed-form .form-group input[type="submit"], .comming-soon .emailed-form button,
.accordion-box .block .acc-btn.active .icon-outer .icon-minus,
.related-items .owl-nav .owl-prev:hover, .related-items .owl-nav .owl-next:hover,
.main-slider-three .owl-nav .owl-prev:hover, .main-slider-three .owl-nav .owl-next:hover,
.news-block-six .inner-box .image-box .image .overlay-box .overlay-inner .content .category,
.blog-carousel-section .owl-nav .owl-prev:hover, .blog-carousel-section .owl-nav .owl-next:hover,
.featured-block-section .owl-nav .owl-prev:hover, .featured-block-section .owl-nav .owl-next:hover,
.category-tabs-box .owl-nav .owl-next:hover, .category-tabs-box .owl-nav .owl-prev:hover,
.economics-category .owl-nav .owl-next:hover, .economics-category .owl-nav .owl-prev:hover{
	background-color: <?php echo $bgtheme['theme_main']?>;
}


/*Border Color*/

.btn-style-two:hover,
.btn-style-one:hover,
.main-header .language .dropdown-menu,
.styled-pagination li a:hover, .styled-pagination li a.active,
.main-header .header-lower .search-box-outer .dropdown-menu,
.main-header .header-lower .search-panel input:focus,
.main-header .header-lower .search-panel select:focus,
.news-block-three .inner-box .image .overlay-box .play-btn:hover,
.sidebar .search-box .form-group input[type="text"]:focus,
.sidebar .search-box .form-group input[type="search"]:focus,
.main-slider-three .owl-nav .owl-prev:hover,
.main-slider-three .owl-nav .owl-next:hover,
.accordion-box .block .acc-btn.active .icon-outer,
.faq-section .faq-search-box .form-group input:focus,
.accordion-box .block .acc-btn.active .icon-outer .icon-minus,
.faq-form .form-group input[type="text"]:focus,
.faq-form .form-group input[type="password"]:focus,
.faq-form .form-group input[type="tel"]:focus,
.faq-form .form-group input[type="email"]:focus,
.faq-form .form-group select:focus,
.faq-form .form-group textarea:focus,
.btn-style-three:hover,
.error-search-box .form-group input:focus,
.blog-single .inner-box .text blockquote,
.related-item-carousel .owl-nav .owl-next:hover,
.related-item-carousel .owl-nav .owl-prev:hover,
.comment-box .comment .comment-inner .reply-btn:hover,
.comment-form .form-group input[type="text"]:focus,
.comment-form .form-group input[type="email"]:focus,
.comment-form .form-group textarea:focus,
.shop-comment-form .form-group input[type="text"]:focus,
.shop-comment-form .form-group input[type="password"]:focus,
.shop-comment-form .form-group input[type="tel"]:focus,
.shop-comment-form .form-group input[type="email"]:focus,
.shop-comment-form .form-group select:focus,
.shop-comment-form .form-group textarea:focus,
.shop-form input:focus, .shop-form select:focus, .shop-form textarea:focus,
.contact-form input:focus, .contact-form select:focus, .contact-form textarea:focus,
.category-tabs-box .owl-nav .owl-next:hover, .category-tabs-box .owl-nav .owl-prev:hover,
.economics-category .owl-nav .owl-next:hover, .economics-category .owl-nav .owl-prev:hover{
	border-color: <?php echo $bgtheme['theme_main']?>;
}

/*RGBA Color Light*/
.default-portfolio-item .overlay-inner,
.default-portfolio-item .overlay-inner .option-btn:hover{
	background-color:rgba(0,116,217,0.80);
}

/*RGBA Color Dark*/

@media only screen and (max-width: 767px){

}
</style>