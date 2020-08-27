$(function () {
    // $('.slider__inner, .news__slider-inner').slick({
    $('.superfood__slider-inner, .news__slider-inner').slick({
        nextArrow: '<button type="button" class="slick-btn slick-next"></button>',
        prevArrow: '<button type="button" class="slick-btn slick-prev"></button>',
        infinite: false,
        asNavFor: '.slider-nav'
    })
    $('.slider-nav').slick({
        arrows: false,
        slidesToShow: 12,
        slidesToScroll: 1,
        asNavFor: '.superfood__slider-inner',
        focusOnSelect: true,
    });

    $('select').styler()
    $('.header__btn-menu').on('click', function () {
        $('.menu ul').slideToggle()
    })
})
