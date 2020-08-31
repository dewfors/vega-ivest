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
    $('#form').submit(function (event) {
        event.preventDefault();
        // console.log("send mail");

        // fio
        let fio = $(this).find('#fio').val();

        // email
        let email = $(this).find('#email').val();

        // tel
        let tel = $(this).find('#tel').val();

        const ob = {
            fio,
            email,
            tel,
        }
        // console.log(ob);


        // Ajax запрос к текущей страницы (а на ней наш сниппет) методом post
        let jqxhr  = $.post("http://investsuperfoods.ru/mail.php",
            {
                fio: fio,
                email: email,
                tel: tel,
            },
            function(data) {
                // Выдаем ответ
                //alert('Запрос успешно выполнен')
                //$('#result').html(data);
                // let info             = document.getElementById('selePodrInfo');
                // info.innerHTML = data;

                //console.log(data);
                //console.log($('.autodelivery-form'));

                $('#form')[0].reset();
                //
                // alert("Заявка на доставку с автоперевозкой отправлена");
                $('.popup-fade').fadeIn();



            });



    })

    // события для закрытия popup
    $(document).ready(function($) {
        // Клик по ссылке "Закрыть".
        $('.popup-close').click(function() {
            $(this).parents('.popup-fade').fadeOut();
            return false;
        });

        // Закрытие по клавише Esc.
        $(document).keydown(function(e) {
            if (e.keyCode === 27) {
                e.stopPropagation();
                $('.popup-fade').fadeOut();
            }
        });

        // Клик по фону, но не по окну.
        $('.popup-fade').click(function(e) {
            if ($(e.target).closest('.popup').length == 0) {
                $(this).fadeOut();
            }
        });
    });

})
