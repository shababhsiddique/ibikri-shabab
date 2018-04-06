jQuery(function ($) {

    'use strict';


    // -------------------------------------------------------------
    //  ScrollUp Minimum setup
    // -------------------------------------------------------------

    (function () {

        $.scrollUp();

    }());

    // -------------------------------------------------------------
    //  Placeholder
    // -------------------------------------------------------------

    (function () {

        var textAreas = document.getElementsByTagName('textarea');

        Array.prototype.forEach.call(textAreas, function (elem) {
            elem.placeholder = elem.placeholder.replace(/\\n/g, '\n');
        });

    }());



    // -------------------------------------------------------------
    //  Show 
    // -------------------------------------------------------------

    (function () {

        $("document").ready(function ()
        {
            $(".more-category.one").hide();
            $(".show-more.one").click(function ()
            {
                $(".more-category.one").show();
                $(".show-more.one").hide();
            });
        });

        $("document").ready(function ()
        {
            $(".more-category.two").hide();
            $(".show-more.two").click(function ()
            {
                $(".more-category.two").show();
                $(".show-more.two").hide();
            });
        });

        $("document").ready(function ()
        {
            $(".more-category.three").hide();
            $(".show-more.three").click(function ()
            {
                $(".more-category.three").show();
                $(".show-more.three").hide();
            });
        });

    }());


    // -------------------------------------------------------------
    //  Slider
    // -------------------------------------------------------------

    (function () {

        $('#price').slider();

    }());




    // -------------------------------------------------------------
    //  language Select
    // -------------------------------------------------------------

    (function () {

        $('.language-dropdown').on('click', '.language-change a', function (ev) {
            if ("#" === $(this).attr('href')) {
                ev.preventDefault();
                var parent = $(this).parents('.language-dropdown');
                parent.find('.change-text').html($(this).html());
            }
        });

        $('.category-dropdown').on('click', '.category-change a', function (ev) {
            if ("#" === $(this).attr('href')) {
                ev.preventDefault();
                var parent = $(this).parents('.category-dropdown');
                parent.find('.change-text').html($(this).html());
            }
        });

    }());


    // -------------------------------------------------------------
    //  Tooltip
    // -------------------------------------------------------------

    (function () {

        $('[data-toggle="tooltip"]').tooltip();

    }());


    // -------------------------------------------------------------
    // Accordion
    // -------------------------------------------------------------

    (function () {
        $('.collapse').on('show.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-minus"></i>');
        });

        $('.collapse').on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-plus"></i>');
        });
    }());


    // -------------------------------------------------------------
    //  Checkbox Icon Change
    // -------------------------------------------------------------

    (function () {

        $('input[type="checkbox"]').change(function () {
            if ($(this).is(':checked')) {
                $(this).parent("label").addClass("checked");
            } else {
                $(this).parent("label").removeClass("checked");
            }
        });

    }());


    // -------------------------------------------------------------
    //  select-category Change
    // -------------------------------------------------------------
    $('.select-category.post-option ul li a').on('click', function () {
        $('.select-category.post-option ul li.link-active').removeClass('link-active');
        $(this).closest('li').addClass('link-active');
    });

    $('.subcategory.post-option ul li a').on('click', function () {
        $('.subcategory.post-option ul li.link-active').removeClass('link-active');
        $(this).closest('li').addClass('link-active');
    });

    // -------------------------------------------------------------
    //   Show Mobile Number
    // -------------------------------------------------------------  

    (function () {

        $('.show-number').on('click', function () {
            $('.hide-text').fadeIn(500, function () {
                $(this).addClass('hide');
            });
            $('.hide-number').fadeIn(500, function () {
                $(this).addClass('show');
            });
        });


    }());


// script end
});


// -------------------------------------------------------------
//  Owl Carousel
// -------------------------------------------------------------


(function () {

    $("#featured-slider").owlCarousel({
        items: 3,
        nav: true,
        autoplay: true,
        dots: true,
        autoplayHoverPause: true,
        nav: true,
        navText: [
            "<i class='fa fa-angle-left '></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
                slideBy: 1
            },
            500: {
                items: 2,
                slideBy: 1
            },
            991: {
                items: 2,
                slideBy: 1
            },
            1200: {
                items: 3,
                slideBy: 1
            },
        }

    });

}());


(function () {

    $("#featured-slider-two").owlCarousel({
        items: 4,
        nav: true,
        autoplay: true,
        dots: true,
        autoplayHoverPause: true,
        nav: true,
        navText: [
            "<i class='fa fa-angle-left '></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        responsive: {
            0: {
                items: 1,
                slideBy: 1
            },
            480: {
                items: 2,
                slideBy: 1
            },
            991: {
                items: 3,
                slideBy: 1
            },
            1000: {
                items: 4,
                slideBy: 1
            },
        }

    });



}());

(function () {

    $(".testimonial-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        autoplayHoverPause: true
    });

}());

(function () {

    $(".car-slider").owlCarousel({
        items: 1,
        autoplay: true,
        autoplayHoverPause: true
    });

}());


function makeNotification(nType, nTitle, nMessage) {

    var nIcon = '';
    
    switch (nType) {
        case 'info':
            nIcon = "fa fa-bell-o";
            break;
        case 'success':
            nIcon = "fa fa-check-circle";
            break;
        case 'danger':
            nIcon = "fa fa-exclamation-circle";
            break;
            
        default:
            nIcon = "fa fa-bell-o";
            break;
    }

    $.notify({
        /* options */
        icon: nIcon,
        title: '<strong>'+nTitle+'</strong>',
        message: nMessage
    }, {
        /* settings */
        type: nType,
        allow_dismiss: true,
        placement: {
            from: "top",
            align: "right"
        },
        delay: 5000,
        timer: 5000,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-{0}" role="alert">' +
                '<h4 data-notify="title"><i data-notify="icon"></i> {1}</h4> ' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<p data-notify="message">{2}</p>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
    });
}


function verifyTick() {

    if ($('#confirm').is(":checked")) {
        return true;
    } else {
        $("#confirm-err").html(" *Required");
        return false;
    }
}


$(document).on("click", ".confirmDelete", function (e) {
    var link = $(this).attr("href"); // "get" the intended link in a var
    e.preventDefault();
    bootbox.confirm({
        message: "<h4><strong>Are you sure you want to delete?</strong></h4>",
        buttons: {
            cancel: {
                label: 'No, Dont delete',
                className: 'btn-success'
            },
            confirm: {
                label: 'Yes, I am sure',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {
                document.location.href = link; // if result, "set" the document location       
            }
        }
    });
});

$(".popupFacebook").on("click",function(){
    var href = $(this).data('href');
    var fbpopup = window.open("https://www.facebook.com/sharer/sharer.php?u="+href, "pop", "width=600, height=400, scrollbars=no");
    return false;
});

$(".popupTwitter").on("click",function(){
    var href = $(this).data('href');
    var text = $(this).data('text');
    var twpopup = window.open("https://twitter.com/intent/tweet?url="+href+"&text="+text, "pop", "width=600, height=400, scrollbars=no");
    return false;
});

$(".popupGoogle").on("click",function(){
    var href = $(this).data('href');
    var text = $(this).data('text');
    var fbpopup = window.open("https://twitter.com/intent/tweet?url="+href+"&text="+text, "pop", "width=600, height=400, scrollbars=no");
    return false;
});