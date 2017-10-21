$(function() {

    //range slider

    $("#price-filter").ionRangeSlider({
        hide_min_max: true,
        keyboard: true,
        min: 1000000,
        max: 40000000,
        from: 1000000,
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
        min: 10,
        max: 350,
        from: 10,
        to: 260,
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

        $('#' + ident + '-svg').show();
        $('svg').not('#' + ident + '-svg').hide();

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
                var j = 0;
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
                number = $(this).data("number");
                	$("#map-" + ident).attr('data-number', number);
                price = $(this).data("price");
                	$("#map-" + ident).attr('data-price', price);
                status = $(this).data("status");
                	$("#map-" + ident).attr('data-status', status);
                floor = $(this).data("floor");
                	$("#map-" + ident).attr('data-floor', floor);
                area = $(this).data("area");
                	$("#map-" + ident).attr('data-area', area);
                rooms = $(this).data("rooms");
                	$("#map-" + ident).attr('data-rooms', rooms);
                show_page = true;

                objectList[i] = {
                    show_page: show_page,
                    id: ident,
                    number: number,
                    price: price,
                    status: status,
                    floor: floor,
                    area: area,
                    rooms: rooms,
                };

                i++;

            }).get();

			//getFLoorObjData();

            console.log('empty objectList: ');
            console.log(objectList);
        }
    }

	function addUnactiveClass() {
		for (var key in objectList) {
			
			if(objectList[key].show_page === false) {
				$('#map-' + objectList[key].id).addClass('polygon-class-fog');	
			}
			else {
				$('#map-' + objectList[key].id).removeClass('polygon-class-fog');
			}
		}
	}
	
    getObjectList();


		//модальное окно поэтажный план
	  $('.polygon-class-appart').click(function() {

				$('.number-popup').html('№' + $(this).data('number'));
                $('.price-popup' ).html( $(this).data('price') );
                $('.status-popup').html( $(this).data('status') );
                $('.floor-popup' ).html( $(this).data('floor') );
                $('.area-popup'	 ).html( $(this).data('area') );
                $('.rooms-popup' ).html( $(this).data('rooms') );

        $.magnificPopup.open({
            items: {
                src: "#popup-modal-window"
            }
        });

        //$('.burger-maks').addClass('active-maks');
    });

		//модальное окно фильтр
	  $('.appart').click(function() {
			//alert('appart');
				$('.number-popup').html('№' + $(this).data('number'));
                $('.price-popup' ).html( $(this).data('price') );
                $('.status-popup').html( $(this).data('status') );
                $('.floor-popup' ).html( $(this).data('floor') );
                $('.area-popup'	 ).html( $(this).data('area') );
                $('.rooms-popup' ).html( $(this).data('rooms') );

        $.magnificPopup.open({
            items: {
                src: "#popup-modal-window"
            }
        });

        //$('.burger-maks').addClass('active-maks');
    });


	// установим обработчик события mousemove, элементу с классом polygon-class-appart
    $('.polygon-class-appart').mousemove(
        function(pos) {
            var showStatus = $(this).data('status');
            console.log(showStatus);
            $("#show-status-object").html(showStatus).css('left', (pos.pageX + 10) + 'px').css('top', (pos.pageY + 10) + 'px');
            $(this).addClass('polygon-class-active');   
            $("#show-status-object").show();
            
        }).mouseleave(function() {
        $(this).removeClass('polygon-class-active');
        $("#show-status-object").hide();
    });



























    //MODx pdoResources Ajax Filter
    //Filter Settings
    var fadeSpeed = 200, // Fade Animation Speed
        ajaxCountSelector = '.ajax-count', // CSS Selector of Items Counter
        ajaxContainerSelector = '.ajax-container', // CSS Selector of Ajax Container
        ajaxItemSelector = '.ajax-item', // CSS Selector of Ajax Item
        ajaxFormSelector = '.ajax-form', // CSS Selector of Ajax Filter Form
        ajaxFormButtonStart = '.ajax-start', // CSS Selector of Button Start Filtering
        ajaxFormButtonReset = '.ajax-reset', // CSS Selector of Button Reset Ajax Form
        sortDownText = 'По убыванию',
        sortUpText = 'По возрастанию';

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
            data: $(ajaxFormSelector).serialize()
        }).done(function(response) {
            var $response = $(response);
            $(ajaxContainerSelector).fadeOut(fadeSpeed);
            setTimeout(function() {
                $(ajaxContainerSelector).html($response.find(ajaxContainerSelector).html()).fadeIn(fadeSpeed);
                ajaxCount();
            }, fadeSpeed);
        }).done(function() {
			
            setTimeout(function() {
                getObjectList();
                addUnactiveClass();
            }, 500);

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
		console.log('floor: ' + floor);
	
        $('#floor_filter').val(floor);
        
        ajaxMainFunction();
        ajaxCount();
        
        var resetPrice = $("#price-filter").data("ionRangeSlider");
        var resetArea = $("#area-filter").data("ionRangeSlider");
        resetPrice.reset();
        resetArea.reset();
        $('.room-filter-btn').removeClass('active');
        $('.type-filter-btn').removeClass('active');
        $('.status-filter-btn').removeClass('active');
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
























































// $(function() {

// 			//range slider

//         $("#price-filter").ionRangeSlider({
//             hide_min_max: true,
//             keyboard: true,
//             min: 1000000,
//             max: 40000000,
//             from: 1000000,
//             to: 40000000,
//             type: 'double',
//             step: 500000,
//             postfix: " руб.",
//             grid: false,
//             onFinish: function () {
//             	ajaxMainFunction();
//             }
//         });

// 	        $("#area-filter").ionRangeSlider({
// 	            hide_min_max: true,
// 	            keyboard: true,
// 	            min: 10,
// 	            max: 350,
// 	            from: 10,
// 	            to: 260,
// 	            type: 'double',
// 	            step: 10,
// 	            postfix: " m<sup><small>2</small></sup>",
// 	            grid: false,
// 	            onFinish: function () {
//             	ajaxMainFunction();
//             	}
// 	        });

// 				// range slider reset button

// 		$('#range-reset').click(function() {
// 			var resetPrice = $("#price-filter").data("ionRangeSlider");
// 			var resetArea = $("#area-filter").data("ionRangeSlider");
// 			resetPrice.reset();
// 			resetArea.reset();
// 			$('.room-filter-btn').removeClass('active');
// 			$('.type-filter-btn').removeClass('active');
// 			$('#type-3').addClass('active');
// 			$('.status-filter-btn').removeClass('active');

// 		});

// 				//check active floor

// 		$('.floor-filter-btn').click(function() {
// 			searchInObjectList();

// 			var floor = $(this).data('floor');
// 			$('#floor-filter').val(floor);

// 			var ident = $(this).attr('id');
// 			$(this).addClass('active-btn');
// 			console.log(ident);
// 			$('.floor-filter-btn').not(document.getElementById(ident)).removeClass('active-btn');

// 			var ID = $(this).attr('id');
// 			global_ident = ID;
// 			console.log('floor id: ' + ID);
// 			$('#' + ID + '-svg').show();
// 			$('svg').not('#' + ID + '-svg').hide();

// 			ajaxMainFunction();

// 			setTimeout(function() {
// 				getMainObjectList();	      
// 				getFloorList();	

// 			}, 1000);			

// 		});


// 			var type_id = 'type-3';

// 				// нужно больше click`ов!!!!!
// 		$('.room-filter-btn').click(function() {		
// 			var ID = $(this).attr('id');
// 			//console.log(ID);
// 			$('#' + ID).toggleClass('active');
// 		});


// 		$('.type-filter-btn').click(function() {		
// 			var ID = $(this).attr('id');
// 			//console.log(ID);
// 			$('#' + ID).addClass('active');
// 			$('.type-filter-btn').not('#' + ID).removeClass('active');

// 		});

// 		$('.status-filter-btn').click(function() {		
// 			var ID = $(this).attr('id');
// 			//console.log(ID);
// 			$('#' + ID).toggleClass('active');
// 		});

// 		// $('.floor-filter-btn').click(function() {		
// 		// 	var ID = $(this).attr('id');
// 		// 	console.log('floor id: ' + ID);
// 		// 	$('#' + ID + '-svg').removeClass('hidden');
// 		// 	$('svg').not('#' + ID + '-svg').addClass('hidden');
// 		// });

// 			// $('svg').not('#floor-filter-1-svg').hide();
// 			//$('.polygon-class-appart').css('opacity', '0');

// 		var global_ident = 'floor-filter-1-svg';

// 		// $('.floor-filter-btn').click(function() {

// 		// 	var ID = $(this).attr('id');
// 		// 	global_ident = ID;
// 		// 	console.log('floor id: ' + ID);
// 		// 	$('#' + ID + '-svg').show();
// 		// 	$('svg').not('#' + ID + '-svg').hide();

// 		// 	getMainObjectList();
// 		// });



// 			var ID_polygon,
// 			 	floorList,
// 				searchResult;

// 			var ident,
// 				price,
// 				status,
// 				floor,
// 				area,
// 				rooms;

// 			var	mainObjectList = [];



// 				//собираем свойства поэтажных квартир на странице	
// 		function getMainObjectList() {
// 			var i = 0;
// 			var main = [];

// 			$(".appart").map(function(){

// 				ident 	=  $(this).attr("id");
// 				number 	=  $(this).data("number");
// 				price 	=  $(this).data("price");
// 			    status 	=  $(this).data("status");
// 				floor 	=  $(this).data("floor");
// 				area 	=  $(this).data("area");
// 				rooms 	=  $(this).data("rooms");



// 					main[i] = {
// 					id: 	ident,
// 					number: number,
// 					price: 	price,
// 					status: status,
// 					floor: 	floor,
// 					area: 	area,
// 					rooms: 	rooms

// 				};

// 				i++;

// 			}).get();

// 			mainObjectList = main;
// 			console.log('mainObjectList: ') + console.log(mainObjectList);
// 		}


// 			//собираем свойства сгенерированных квартир на странице
// 		function getFilterObjectList() {
// 			var i = 0;
// 			var	filterObjectList = [];
// 			$(".appart").map(function(){

// 				ident 	=  $(this).attr("id");
// 				number 	=  $(this).data("number");
// 				price 	=  $(this).data("price");
// 			    status 	=  $(this).data("status");
// 				floor 	=  $(this).data("floor");
// 				area 	=  $(this).data("area");
// 				rooms 	=  $(this).data("rooms");

// 				filterObjectList[i] = {
// 					id: 	ident,
// 					number: number,
// 					price: 	price,
// 					status: status,
// 					floor: 	floor,
// 					area: 	area,
// 					rooms: 	rooms

// 				};

// 				i++;

// 			}).get();
// 			console.log('Сгенерированные: ');
// 			console.log(filterObjectList);
// 			return filterObjectList;
// 		}
// 			//собираем data квартир на поэтажном плане
// 		function getFloorList() {

// 			console.log('global_ident: ' + global_ident);

// 			floorList = $("." + global_ident + "-svg").map(function(){
// 			    return $(this).data('ident');
// 			}).get();

// 			console.log('Поэтажный: ');
// 			console.log(floorList);
// 			return floorList;
// 		}


// 			//console.log('Объект');
// 			getMainObjectList();
// 			getFilterObjectList();
// 			getFloorList();


// 			 //ищем совпадения отфильтрованных квартир на поэтажном плане
// 		function searchInObjectList() 
// 		{		
// 			var filterObjectList = getFilterObjectList();
// 				$('.polygon-class-appart').addClass('polygon-class-fog');
// 				$.each(floorList, function(index, value) {
// 					for(var key in filterObjectList) {
// 						if('id-appart-'+ value == filterObjectList[key].id) {
// 							$('#appart-'+ value).removeClass('polygon-class-fog');
// 						}
// 					}
// 				});

// 				$.each(floorList, function(index, value) {
// 					for(var key in mainObjectList) {
// 						if('id-appart-'+ value == mainObjectList[key].id) {
// 							//console.log(key + ': id-appart-'+ value + '; ' + mainObjectList[key].id);
// 							//$(".polygon-class-appart").addClass('my-ultra-class');
// 							$('#appart-' + value).attr('data-status', mainObjectList[key].status);
// 							//("#appart-" + value).css('opacity', '100');
// 						}
// 					}
// 				});
// 		}

// 			searchInObjectList();

// 			// установим обработчик события mousemove, элементу с классом polygon-class-appart
// 		$('.polygon-class-appart').mousemove(
// 			function(pos){
// 			  	ID_polygon = $(this).data('ident');
// 				//console.log('ID_polygon: id-appart-' + ID_polygon);
// 			  $.each(mainObjectList, function(index, value) {

// 				if(value.id == 'id-appart-' + ID_polygon) {
// 						//console.log('value: ' + value);
// 						console.log('ID_polygon: id-appart-' + ID_polygon);
// 						//console.log(pos.pageX + pos.pageY);

// 						var showStatus = $('#appart-' + ID_polygon).data('status');
// 						console.log(showStatus);
// 	      				$("#show-status-object").html(showStatus).css('left',(pos.pageX+10)+'px').css('top',(pos.pageY+10)+'px');
// 						$("#show-status-object").show();
// 						$('#appart-' + ID_polygon).addClass('polygon-class-active');
// 				}
// 			});
// 		}).mouseleave(function() {
// 			$('#appart-' + ID_polygon).removeClass('polygon-class-active');
// 			$("#show-status-object").hide();
// 		});	




// 			//модальное окно поэтажный план, присваиваем значение объекту
// 		$('.polygon-class-appart').click(function() {

// 				var ID = $(this).data('ident');
// 					for(var key in mainObjectList) {
// 						if('id-appart-'+ ID == mainObjectList[key].id) {
// 							//console.log(key + ': id-appart-'+ value + '; ' + mainObjectList[key].id);
// 							$('.number-popup').html('№' + mainObjectList[key].number);
// 							$('.price-popup').html(mainObjectList[key].price);
// 							$('.status-popup').html(mainObjectList[key].status);
// 							$('.floor-popup').html(mainObjectList[key].floor);
// 							$('.area-popup').html(mainObjectList[key].area);
// 							$('.rooms-popup').html(mainObjectList[key].rooms);
// 						}
// 					}

// 			$.magnificPopup.open({
// 				items: {
// 					src: "#popup-modal-window"
// 				}
// 			});

// 			$('.burger-maks').addClass('active-maks');
// 		});	


// 			//модальное окно отфильтрованные объекты, присваиваем значение объекту
// 			function bagAjax() {
// 		$('.appart').click(function() {

// 				var filterObjectList = getFilterObjectList();

// 					console.log(filterObjectList);

// 				var ID = $(this).attr('id');
// 					for(var key in filterObjectList) {
// 						if(ID == filterObjectList[key].id) {
// 							//console.log(key + ': id-appart-'+ value + '; ' + mainObjectList[key].id);
// 							$('.number-popup').html('№' + filterObjectList[key].number);
// 							$('.price-popup').html(filterObjectList[key].price);
// 							$('.status-popup').html(filterObjectList[key].status);
// 							$('.floor-popup').html(filterObjectList[key].floor);
// 							$('.area-popup').html(filterObjectList[key].area);
// 							$('.rooms-popup').html(filterObjectList[key].rooms);
// 						}
// 					}

// 			$.magnificPopup.open({
// 				items: {
// 					src: "#popup-modal-window"
// 				}
// 			});

// 			$('.burger-maks').addClass('active-maks');
// 		});	

// 	}

// 		bagAjax();


//     //MODx pdoResources Ajax Filter
//     //Filter Settings
//     var fadeSpeed             = 200, // Fade Animation Speed
//         ajaxCountSelector     = '.ajax-count', // CSS Selector of Items Counter
//         ajaxContainerSelector = '.ajax-container', // CSS Selector of Ajax Container
//         ajaxItemSelector      = '.ajax-item', // CSS Selector of Ajax Item
//         ajaxFormSelector      = '.ajax-form', // CSS Selector of Ajax Filter Form
//         ajaxFormButtonStart   = '.ajax-start', // CSS Selector of Button Start Filtering
//         ajaxFormButtonReset   = '.ajax-reset', // CSS Selector of Button Reset Ajax Form
//         sortDownText          = 'По убыванию',
//         sortUpText            = 'По возрастанию';

//     function ajaxCount() {

//         if($('.ajax-filter-count').length) {
//             var count = $('.ajax-filter-count').data('count');
//             $(ajaxCountSelector).text(count);
//         } else {
//             $(ajaxCountSelector).text($(ajaxItemSelector).length);
//         }
//     }ajaxCount();

//     function ajaxMainFunction() {

//         $.ajax({
//             data: $(ajaxFormSelector).serialize()
//         }).done(function(response) {
//             var $response = $(response);
//             $(ajaxContainerSelector).fadeOut(fadeSpeed);
//             setTimeout(function() {
//                 $(ajaxContainerSelector).html($response.find(ajaxContainerSelector).html()).fadeIn(fadeSpeed);
//                 ajaxCount();
//             }, fadeSpeed);
//         }).done(function() {

// 	        	setTimeout(function() {
// 				searchInObjectList();
// 				getFilterObjectList();
// 				bagAjax();

// 				}, 2000);


//         });	
//     }

//     $(ajaxContainerSelector).on('click', '.ajax-more', function(e) {
//         e.preventDefault();
//         var offset = $(ajaxItemSelector).length;
//         $.ajax({
//             data: $(ajaxFormSelector).serialize()+'&offset='+offset
//         }).done(function(response) {
//             $('.ajax-more').remove();
//             var $response = $(response);
//             $response.find(ajaxItemSelector).hide();
//             $(ajaxContainerSelector).append($response.find(ajaxContainerSelector).html());
//             $(ajaxItemSelector).fadeIn();
//         });
//     })

//     $(ajaxFormButtonStart).click(function(e) {
//         e.preventDefault();
//         ajaxMainFunction();
//     })

//     $(ajaxFormButtonReset).click(function(e) {
//         e.preventDefault();
//         $(ajaxFormSelector).trigger('reset');
//         $('input[name=sortby]').val('pagetitle');
//         $('input[name=sortdir]').val('asc');
//         setTimeout(function() {
//             $('.room-filter-btn').toggleClass('button-sort-asc');
//         }, fadeSpeed);
//         ajaxMainFunction();
//         ajaxCount();
//     })

//     $(''+ajaxFormSelector+' .change_filter').change(function() {
//         ajaxMainFunction();
//     })

//     $('[data-sort-by]').data('sort-dir', 'asc').click(function() {
//         var ths = $(this);
//         $('input[name=sortby]').val($(this).data('sort-by'));
//         $('input[name=sortdir]').val($(this).data('sort-dir'));
//         setTimeout(function() {
//             $('[data-sort-by]').not(this).toggleClass('button-sort-asc').text(sortUpText);
//             ths.data('sort-dir') == 'asc' ? ths.data('sort-dir', 'desc').text(sortDownText) : ths.data('sort-dir', 'asc').text(sortUpText);
//             $(this).toggleClass('button-sort-asc');
//         }, fadeSpeed);
//         ajaxMainFunction();
//     });

// });