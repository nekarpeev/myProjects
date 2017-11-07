var getFunc;
$(function() {


    $('.dropdown-grade').dropdown()//инифциализируем bootstrap
    $('.dropdown-year').dropdown()//инифциализируем bootstrap

    $('#comment-new-link').hide();

    function mobileHideVideo() {
//Создаем объект 'user', который будет содержать информацию Detect.js
//Вызываем detect.parse() с navigator.userAgent в качестве аргумента
        var user = detect.parse(navigator.userAgent);

//Определение типа устройства
        var deviceType = user.device.type;

        $('#slide_bg').hide();

        if(deviceType == 'Mobile' || deviceType == 'Tablet') {
            $('.owl-dots').hide();
            $('#video_player').hide();
            $('#slide_bg').show();
        }
        if(deviceType == 'Desktop') {
            commentShow();
        }

    }


    function getActiveTeg() {

        var tegActive = $('.product-categury-top-nav').data('tegactive');
        var teg = [],
            i = 0;

        $('.tag-element').map(function() {

            teg = $(this).data('tegname');
            if( teg == tegActive ) {
                $(this).addClass('ne-active-link')
                console.log(tegActive);
            }
        });
    }

    function getSearchString() {
        var searchLaur = [],
            searchYear = [],
            any = '';

        $('.ne-true-skill').map(function() {

            if ( $(this).attr('data-year') !== undefined ) {
                if(searchYear.length >= 1) {
                    searchYear[0] = searchYear + ', ' + $(this).attr('data-year');
                }
                else {
                    searchYear[0] = searchYear + $(this).attr('data-year');
                }
            }
            if ( $(this).attr('data-laur') !== undefined ) {
                if(searchLaur.length >= 1) {
                    searchLaur[0] = searchLaur + ', ' + $(this).attr('data-laur');
                }
                else {
                    searchLaur[0] = searchLaur + $(this).attr('data-laur');
                }
            }
        });

        if(searchLaur.length >= 1) {
            $('.search-string').html('Поиск: ' + searchLaur);
        }
        if(searchYear.length >= 1) {
            $('.search-string').html('Поиск: ' + searchYear);
        }
        if(searchLaur.length >= 1 & searchYear.length >= 1) {
            $('.search-string').html('Поиск: ' + searchLaur + ' за ' + searchYear + ' год');
        }
    }



    $('.btn-check-grade').click(function() {

        var myPer = $(this).data('filter'),
            gradeName,
            id = '#' + myPer;

        if(myPer === 'reset') {
            $('.grade-class').prop('checked',false);
            $('.grade-class').removeClass('ne-true-skill');

            gradeName = $(this).html();
            $('.dropdown-grade').html(gradeName);

            ajaxMainFunction();
        }
        else {

            $(id).prop('checked',true);
            $(id).addClass('ne-true-skill');
            $(this).toggleClass('ne-active-link');
            $('.grade-class').not(id).removeClass('ne-true-skill');
            $('.grade-class').not(id).prop('checked',false);

            gradeName = $(this).html();
            $('.dropdown-grade').html(gradeName);
            ajaxMainFunction();
        }

    });

    $('.btn-check-year').click(function() {
        if(myPer === 'reset') {
            $('.year-class').prop('checked',false);
            $('.year-class').removeClass('ne-true-skill');

            gradeName = $(this).html();
            $('.dropdown-year').html(gradeName);

            ajaxMainFunction();
        }
        else {
            var myPer = $(this).data('filter'),
                id = '#' + myPer;
            $(id).prop('checked',true);
            $(id).addClass('ne-true-skill');
            $(this).toggleClass('ne-active-link');
            $('.year-class').not(id).removeClass('ne-true-skill');
            $('.year-class').not(id).prop('checked',false);

            var gradeName = $(this).html();
            $('.dropdown-year').html(gradeName);
            ajaxMainFunction();
        }

    });



    function commentShow() {

        $('#comments-wrapper').hide();
        $('#comment-form-placeholder').hide();
        $( "#comment-form" ).hide();
        $( ".comment-hr" ).hide();

        $('.comment-show').click( function() {
            $( "#comment-form-placeholder" ).toggle();
            $( ".comment-hr" ).toggle();
            $( "#comments-wrapper" ).toggle();
            $( "#comment-form" ).toggle();

        });
    }

    mobileHideVideo();
    getActiveTeg();

//----------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------AJAX---------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------
//MODx pdoResources Ajax Filter
//Filter Settings
    var fadeSpeed             = 200, // Fade Animation Speed
        ajaxCountSelector     = '.ajax-count', // CSS Selector of Items Counter
        ajaxContainerSelector = '.ajax-container', // CSS Selector of Ajax Container
        ajaxItemSelector      = '.ajax-item', // CSS Selector of Ajax Item
        ajaxFormSelector      = '.ajax-form', // CSS Selector of Ajax Filter Form
        ajaxFormButtonStart   = '.ajax-start', // CSS Selector of Button Start Filtering
        ajaxFormButtonReset   = '.ajax-reset', // CSS Selector of Button Reset Ajax Form
        sortDownText          = 'По убыванию',
        sortUpText            = 'По возрастанию';

    $('' + ajaxFormSelector + '').submit(function() {
        return false;
    });

    function ajaxCount() {

        if($('.ajax-filter-count').length) {
            var count = $('.ajax-filter-count').data('count');
            $(ajaxCountSelector).text(count);
        } else {
            $(ajaxCountSelector).text($(ajaxItemSelector).length);
        }
    }ajaxCount();

    function ajaxMainFunction() {
        $.ajax({
            data: $(ajaxFormSelector).serialize()

        }).done(function(response) {
            var $response = $(response);
            $(ajaxContainerSelector).fadeOut(fadeSpeed);
            setTimeout(function() {
                $(ajaxContainerSelector).html($response.find(ajaxContainerSelector).html()).fadeIn(fadeSpeed);
                ajaxCount();
                getSearchString();
            }, fadeSpeed);
        });
    }

    $(ajaxContainerSelector).on('click', '.ajax-more', function(e) {
        e.preventDefault();
        var offset = $(ajaxItemSelector).length;
        $.ajax({
            data: $(ajaxFormSelector).serialize()+'&offset='+offset
        }).done(function(response) {
            $('.ajax-more').remove();
            var $response = $(response);

            $response.find(ajaxItemSelector).hide();
            $(ajaxContainerSelector).append($response.find(ajaxContainerSelector).html());
            $(ajaxItemSelector).fadeIn();
        });
    })

    $(ajaxFormButtonStart).click(function(e) {
        e.preventDefault();
        ajaxMainFunction();
    })

    $(ajaxFormButtonReset).click(function(e) {
        $('.btn-check-filter').removeClass('ne-active-link');
        $('.ajax-form input').removeClass('ne-true-skill');

        e.preventDefault();
        $(ajaxFormSelector).trigger('reset');
        $('input[name=sortby]').val('pagetitle');
        $('input[name=sortdir]').val('asc');
        setTimeout(function() {
            $('[data-sort-by]').data('sort-dir', 'asc').toggleClass('button-sort-asc').text(sortUpText);
        }, fadeSpeed);
        ajaxMainFunction();
        ajaxCount();
    })

    $(''+ajaxFormSelector+' input').change(function() {
        ajaxMainFunction();
    })

    $('[data-sort-by]').data('sort-dir', 'asc').click(function() {
        var ths = $(this);

        $('input[name=sortby]').val($(this).data('sort-by'));
        $('input[name=sortdir]').val($(this).data('sort-dir'));
        setTimeout(function() {
            $('[data-sort-by]').not(this).toggleClass('button-sort-asc').text(sortUpText);
            ths.data('sort-dir') == 'asc' ? ths.data('sort-dir', 'desc').text(sortDownText) : ths.data('sort-dir', 'asc').text(sortUpText);
            $(this).toggleClass('button-sort-asc');
        }, fadeSpeed);
        ajaxMainFunction();
    });


    $('.owl_time_line').owlCarousel({
        stagePadding: 50,
// center:true,
        loop:false,
        margin:0,
        nav: false,
        items:2,
        stagePadding: 0,
        navText: ['Назад','Вперед'],
        autoplay:true,
        autoplayTimeout: 5000,
        autoplayHoverPause:true,
        smartSpeed: 1000,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }

    });

    (function($){

// Custom easing function
        $.extend( $.easing, {
// This is ripped directly from the jQuery easing plugin (easeOutExpo), from: http://gsgd.co.uk/sandbox/jquery/easing/
            spincrementEasing: function (x, t, b, c, d) {
                return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
            }
        });

// Spincrement function
        $.fn.spincrement = function(opts) {

// Default values
            var defaults = {
                from: 0,
                to: false,
                decimalPlaces: 0,
                decimalPoint: '.',
                thousandSeparator: ',',
                duration: 1000, // ms; TOTAL length animation
                leeway: 50, // percent of duraion
                easing: 'spincrementEasing',
                fade: true
            };
            var options = $.extend(defaults, opts);

// Function for formatting number
            var re_thouSep = new RegExp(/^(-?[0-9]+)([0-9]{3})/);
            function format(num) {
                num = num.toFixed(options.decimalPlaces); // converts to string!

// Non "." decimal point
                if ( (options.decimalPlaces > 0) && (options.decimalPoint != '.') ) {
                    num = num.replace('.', options.decimalPoint);
                }

// Thousands separator
                if (options.thousandSeparator) {
                    while(re_thouSep.test(num)) {
                        num = num.replace(re_thouSep, '$1'+options.thousandSeparator+'$2');
                    }
                }
                return num;
            }

// Apply to each matching item
            return this.each(function() {

// Get handle on current obj
                var obj = $(this);

// Set params FOR THIS ELEM
                var from = options.from;
                var to = (options.to != false) ? options.to : parseFloat(obj.html()); // If no to is set, get value from elem itself
//var to = parseFloat(obj.html()); // If no to is set, get value from elem itself
                var duration = options.duration;
                if (options.leeway) {
// If leeway is set, randomise duration a little
                    duration += Math.round(options.duration * (((Math.random()*2)-1)*(options.leeway)/100));
                }

// DEBUG
//obj.html(to); return;

// Start
                obj.css('counter', from);
                if (options.fade) obj.css('opacity', 0 );
                obj.animate(
                    { counter: to, opacity: 1 },
                    {
                        easing: options.easing,
                        duration: duration,

// Invoke the callback for each step.
                        step: function(progress) {
                            obj.css('visibility', 'visible'); // Make sure it's visible
                            obj.html(format(progress * to));
                        },
                        complete: function() {
// Cleanup
                            obj.css('counter', null);
                            obj.html(format(to));
                        }
                    }
                );
            });

        };
    })(jQuery);

    $(".spincrement").spincrement({
        from: 0,
        to: false,
        decimalPoint: ".",
        thousandSeparator: ",",
        duration: 1000,
    });


});
