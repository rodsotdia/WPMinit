/*-------
SCRIPTS

JQUERY DEPENDENCY SCRIPTS
- SLIDERS (SLICK)
- MAILCHIMP

--------*/
jQuery(function ($) {

    /* ---------
        SLIDERS
    ---------------*/
    /*$(document).ready(function () {
        $('#slider-1').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            autoplay: false,
            // lazyLoad: 'progressive',
            responsive: [{
                    breakpoint: 801,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 601,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    
        $('#slider-2').slick({
            slidesToShow: 2,
            arrows: true,
            dots: false,
            centerMode: true,
            centerPadding: '100px',
            autoplay: false,
            // lazyLoad: 'progressive',
            responsive: [{
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 601,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '60px'
                    }
                },
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false
                    }
                }
            ]
        });
    
        $('#slider-3').slick({
            slidesToShow: 1,
            arrows: true,
            dots: false,
            autoplay: false,
            adaptiveHeight: true
        });
    
        $('#slider-4').slick({
            slidesToShow: 2,
            arrows: true,
            dots: false,
            autoplay: false,
            responsive: [{
                breakpoint: 610,
                settings: {
                    slidesToShow: 1
                }
            }]
        });
    
        $('.slider-5').slick({
           arrows: false,
           dots: false,
           autoplay: false,
        });
    
    });*/

    /*-------------------
    MAILCHIMP
    --------------------*/
    // Newsletter
    /*$('#form-mailchimp-newsletter').on('submit', function(e) {
        // Highjack the submit button, we will do it ourselves
        e.preventDefault();
        // uncomment next line & check console to see if button works
        //console.log('submit button worked!');
        $('#submit-newsletter').val('Enviando...');
        // store all the form data in a variable
        var formData = $(this).serialize();
     
        // console.log(formData);
        // Let's make the call!
        // Replace the path to your own endpoint!
        $.getJSON('https://URL/wp-content/themes/THEME_NAME/mailchimp/mc-end-point.php', formData , function(data) {
           // uncomment next line to see your data output in console
           // console.log(data);
     
           // If it worked...
           if(data.status === 'subscribed') {
              // Let us know!
              $('#form-mailchimp-newsletter').hide();
              $('#fail-response-newsletter').hide();
              $('#success-response-newsletter').show();
           } else {
              // Otherwise tell us why it didn't
              $('#submit-newsletter').val('Enviar');
              $('#fail-response-newsletter').show();
              // console.log(data.detail);
           }
        });
    });*/
}); //jQuery