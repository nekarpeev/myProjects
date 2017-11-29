
$(function() {

function getUri() {
	
	var url = window.location.pathname;
		
	if(url == '/apartments') {
		console.log(url);
		$('.img-class').not('#img-floor-filter-2').hide();
        $('g').not('#svg-floor-filter-2').hide();
	}
	
	if(url == '/parking/') {
		console.log(url);
		$('.img-class').not('#img-floor-filter-6').hide();
        $('.g-class').not('#svg-floor-filter-6').hide();
	}
	
}
	getUri();
	
 
    $('#show-status-object').hide();

    //range slider

    $("#price-filter").ionRangeSlider({
        hide_min_max: true,
        keyboard: true,
        min: 5000000,
        max: 40000000,
        from: 5000000,
        to: 40000000,
        type: 'double',
        step: 500000,
        postfix: " руб.",
        grid: false,
        onFinish: function() {
            ajaxMainFunction();
        }
    });

    $("#area-filter").ionRangeSlider({
        hide_min_max: true,
        keyboard: true,
        min: 30,
        max: 245,
        from: 30,
        to: 245,
        type: 'double',
        step: 10,
        postfix: " m<sup><small>2</small></sup>",
        grid: false,
        onFinish: function() {
            ajaxMainFunction();
        }
    });

		//check active floor
	$('.floor-filter-btn').click(function() {
		objectList = [];
		console.log('click delete objectList');
		$('polygon-class-appart').removeClass('polygon-class-fog');
		
		var resetPrice = $("#price-filter").data("ionRangeSlider");
        var resetArea = $("#area-filter").data("ionRangeSlider");
        resetPrice.reset();
        resetArea.reset();
        $('.room-filter-btn').removeClass('active');
        $('.type-filter-btn').removeClass('active');
        $('.status-filter-btn').removeClass('active');
        
        var ident = $(this).attr('id');
        $(this).addClass('active-btn');
        $('.floor-filter-btn').not(document.getElementById(ident)).removeClass('active-btn');

        $('#img-' + ident).show();
        $('#svg-' + ident).show();
        $('.img-class').not('#img-' + ident).hide();
        $('.g-class').not('#svg-' + ident).hide();

    });
    
    $('.room-filter-btn').click(function() {
        var ID = $(this).attr('id');
        $('#' + ID).toggleClass('active');
    });

    $('.type-filter-btn').click(function() {
        var ID = $(this).attr('id');
        $('#' + ID).addClass('active');
        $('.type-filter-btn').not('#' + ID).removeClass('active');

    });

    $('.status-filter-btn').click(function() {
        var ID = $(this).attr('id');
        $('#' + ID).toggleClass('active');
    });


    var objectList = [];

    function getObjectList() {

        if ($.isEmptyObject(objectList) === false) {
            let i = 0;
            var checkArray = [];

            for (var keyBy in objectList) {
                objectList[keyBy].show_page = false;
            }

            $(".appart").map(function() {

                ident = $(this).attr("id");

                for (var keyTo in objectList) {
                    if (objectList[keyTo].id == ident) {
                        checkArray[i] = keyTo;
                    }
                }
                i++;

            }).get();
					console.log('checkArray: ' + checkArray);
            if ($.isEmptyObject(checkArray) === false) {
                var objKey;
                for (var key in checkArray) {
                    objKey = checkArray[key];
                    objectList[objKey].show_page = true;
                }
            }
            
            console.log('not empty objectList: ');
            console.log(objectList);
            
        } else {
            var ident,
                price,
                status,
                floor,
                area,
                rooms,
                show_page;

            let i = 0;

            $(".appart").map(function() {

                ident = $(this).attr("id");
                status = $(this).data("status");
                	$("#map-" + ident).attr('data-status', status);
                number = $(this).data("number");
                	$("#map-" + ident).attr('data-number', number);
                floor = $(this).data("floor");
                	$("#map-" + ident).attr('data-floor', floor);
                layout = $(this).data("layout");
                	$("#map-" + ident).attr('data-layout', layout);	
                price = $(this).data("price");
                	$("#map-" + ident).attr('data-price', price);
                area = $(this).data("area");
                	$("#map-" + ident).attr('data-area', area);
                rooms = $(this).data("rooms");
                	$("#map-" + ident).attr('data-rooms', rooms);
                show_page = true;
                
                	type = $(this).data("type");
					$("#map-" + ident).attr('data-type', type);
				
                objectList[i] = {
                    show_page: show_page,
                    id: ident,
                    number: number,
                    price: price,
                    status: status,
                    floor: floor,
                    layout: layout,
                    area: area,
                    rooms: rooms,
                };

                i++;

            }).get();
			
            console.log('empty objectList: ');
            console.log(objectList);
        }
    }

	function addUnactiveClass() {
		for (var key in objectList) {
			
			if(objectList[key].show_page === false) {
				console.log('objectList[key].show_page: ' + objectList[key].id);
				$('#map-' + objectList[key].id).addClass('polygon-class-fog');	
			}
			else {
				console.log('objectList[key].show_page: ' + objectList[key].show_page);
				$('#map-' + objectList[key].id).removeClass('polygon-class-fog');
				
			}
		}
	}
	
    getObjectList();

		//модальное окно
	function bagAjax() {
			//alert('bagAjax');
	  $('.appart, .polygon-class-appart').click(function() {
			var layout = $(this).data('layout');
			
			// if($(this).data('type') == 'Апартаменты') {
				$('#popup-modal-window img').attr('src', layout);
	  		//}
	  		// if( $(this).data('type') == 'офис' ) {
	  		// 	var number = $(this).data('ident');
	  		// 	$('#popup-modal-window img').attr('src', 'assets/app/img/floor-img/o-' + number +'.jpg');
	  		// }

			$('.number-popup').html( $(this).data('number') );
			$('.type-popup'	 ).html( $(this).data('type') );
            $('.price-popup' ).html( $(this).data('price') );
            $('.status-popup').html( $(this).data('status') );
            $('.floor-popup' ).html( $(this).data('floor') );
            $('.area-popup'	 ).html( $(this).data('area') );
            $('.rooms-popup' ).html( $(this).data('rooms') );

			$('.form-phone .type-form'	).val( $(this).data('type') );
			$('.form-phone .number-form').val( $(this).data('number') );
			$('.form-phone .floor-form'	).val( $(this).data('floor') );
			$('.form-phone .price-form'	).val( $(this).data('price') );
			$('.form-phone .status-form').val( $(this).data('status') );

	        $.magnificPopup.open({
	            items: {
	                src: "#popup-modal-window"
	            }
	        });
	        //$('.burger-maks').addClass('active-maks');
	    });
	}	
		bagAjax();
	
	// установим обработчик события mousemove, элементу с классом polygon-class-appart
    $('.polygon-class-appart').mousemove(
        function(pos) {
            var showStatus = $(this).data('status');
            //console.log(showStatus);
            $("#show-status-object").html(showStatus).css('left', (pos.pageX + 10) + 'px').css('top', (pos.pageY + 10) + 'px');
            $(this).addClass('polygon-class-active');
            
            if(showStatus === 'Свободно') { 
            	$("#show-status-object").css('color', '#A5B076');
            	 
            }
            else if(showStatus === 'Забронировано') { 
            	$("#show-status-object").css('color', '#888'); 
            }
            else if(showStatus === 'Продано') { 
            	$("#show-status-object").css('color', 'red'); 
            }
            
            $("#show-status-object").show();
            
        }).mouseleave(function() {
        $(this).removeClass('polygon-class-active');
        $("#show-status-object").hide();
    });

    //MODx pdoResources Ajax Filter
    //Filter Settings
    var fadeSpeed 				= 200, // Fade Animation Speed
        ajaxCountSelector 		= '.ajax-count', // CSS Selector of Items Counter
        ajaxContainerSelector 	= '.ajax-container', // CSS Selector of Ajax Container
        ajaxItemSelector 		= '.ajax-item', // CSS Selector of Ajax Item
        ajaxFormSelector 		= '.ajax-form', // CSS Selector of Ajax Filter Form
        ajaxFormButtonStart 	= '.ajax-start', // CSS Selector of Button Start Filtering
        ajaxFormButtonReset 	= '.ajax-reset', // CSS Selector of Button Reset Ajax Form
        sortDownText 			= 'По убыванию',
        sortUpText 				= 'По возрастанию';

    function ajaxCount() {

        if ($('.ajax-filter-count').length) {
            var count = $('.ajax-filter-count').data('count');
            $(ajaxCountSelector).text(count);
        } else {
            $(ajaxCountSelector).text($(ajaxItemSelector).length);
        }
    }
    ajaxCount();

    function ajaxMainFunction() {

        $.ajax({
            data: $(ajaxFormSelector).serialize(),
            async: false,
            complete: function(){
           	console.log('success');
            //console.log('ajaxMainFunction');
              setTimeout(function() {
            	getObjectList();
                addUnactiveClass();
                console.log('addUnactiveClass();');
                bagAjax();  
             }, 500);
                                                                 
            }
        }).done(function(response) {
            var $response = $(response);
            $(ajaxContainerSelector).fadeOut(fadeSpeed);
            setTimeout(function() {
                $(ajaxContainerSelector).html($response.find(ajaxContainerSelector).html()).fadeIn(fadeSpeed);
                ajaxCount();
            }, fadeSpeed);
            
            //  setTimeout(function() {
            	
            // }, 500);
        });
    }

    $(ajaxContainerSelector).on('click', '.ajax-more', function(e) {
        e.preventDefault();
        var offset = $(ajaxItemSelector).length;
        $.ajax({
            data: $(ajaxFormSelector).serialize() + '&offset=' + offset
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
        e.preventDefault();
        $(ajaxFormSelector).trigger('reset');
        
		var floor = $('.active-btn').data('floor');
		console.log('floor ajaxFormButtonReset: ' + floor);
	
        $('#floor_filter').val(floor);
        
        var resetPrice = $("#price-filter").data("ionRangeSlider");
        var resetArea = $("#area-filter").data("ionRangeSlider");
        resetPrice.reset();
        resetArea.reset();
        $('.room-filter-btn').removeClass('active');
        $('.type-filter-btn').removeClass('active');
        $('.status-filter-btn').removeClass('active');
        console.log('ajaxFormButtonReset');
        ajaxMainFunction();
        ajaxCount();
    })

    $('' + ajaxFormSelector + ' .change_filter').change(function() {
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

});




