$(function() {
	
			//range slider
	
        $("#price-filter").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 1000000,
            max: 25000000,
            from: 5000000,
            to: 25000000,
            type: 'double',
            step: 500000,
            postfix: " руб.",
            grid: false,
            onFinish: function () {
            	ajaxMainFunction();
            }
        });

	        $("#area-filter").ionRangeSlider({
	            hide_min_max: true,
	            keyboard: true,
	            min: 10,
	            max: 230,
	            from: 10,
	            to: 230,
	            type: 'double',
	            step: 10,
	            postfix: " m<sup><small>2</small></sup>",
	            grid: false,
	            onFinish: function () {
            	ajaxMainFunction();
            	}
	        });
	
			// range slider reset button
		
		$('#range-reset').click(function() {
			var resetPrice = $("#price-filter").data("ionRangeSlider");
			var resetArea = $("#area-filter").data("ionRangeSlider");
			resetPrice.reset();
			resetArea.reset();
			$('.room-filter-btn').removeClass('active');
			$('.type-filter-btn').removeClass('active');
			$('#type-2').addClass('active');
			$('.status-filter-btn').removeClass('active');
			
		});
		
			//check active floor
		
		$('.floor-filter-btn').click(function() {
			var floor = $(this).data('floor');
			$('#floor-filter').val(floor);
			
			var ID = $(this).attr('id');
			$(this).addClass('active-btn');
			console.log(ID);
			$('.floor-filter-btn').not(document.getElementById(ID)).removeClass('active-btn');

			ajaxMainFunction();
		});
		
		
		
			// yes active class/ no active class
			
			$('.room-filter-btn').click(function() {		
			var ID = $(this).attr('id');
			console.log(ID);
			$('#' + ID).toggleClass('active');
		});
		
		$('.type-filter-btn').click(function() {		
			var ID = $(this).attr('id');
			console.log(ID);
			$('#' + ID).addClass('active');
			$('.type-filter-btn').not('#' + ID).removeClass('active');
		});
		
		$('.status-filter-btn').click(function() {		
			var ID = $(this).attr('id');
			console.log(ID);
			$('#' + ID).toggleClass('active');
		});




			// объявляем переменные потому что можем
			
			var ID_polygon,
			 	floorList,
				searchResult;

			var ident,
				price,
				status,
				floor,
				area,
				rooms;
				
			var	mainObjectList = [];
				
	

			//собираем свойства поэтажных квартир на странице	
		function getMainObjectList() {
			var i = 0;
			
			$(".appart").map(function(){
				
				ident 	=  $(this).attr("id");
				number 	=  $(this).data("number");
				price 	=  $(this).data("price");
			    status 	=  $(this).data("status");
				floor 	=  $(this).data("floor");
				area 	=  $(this).data("area");
				rooms 	=  $(this).data("rooms");
				
				mainObjectList[i] = {
					id: 	ident,
					number: number,
					price: 	price,
					status: status,
					floor: 	floor,
					area: 	area,
					rooms: 	rooms
					
				};
				
				i++;
				
			}).get();
			
			//console.log(mainObjectList);
		}
		
			//собираем свойства сгенерированных квартир на странице
		function getFilterObjectList() {
			var i = 0;
			var	filterObjectList = [];
			$(".appart").map(function(){
				
				ident 	=  $(this).attr("id");
				number 	=  $(this).data("number");
				price 	=  $(this).data("price");
			    status 	=  $(this).data("status");
				floor 	=  $(this).data("floor");
				area 	=  $(this).data("area");
				rooms 	=  $(this).data("rooms");
				
				filterObjectList[i] = {
					id: 	ident,
					number: number,
					price: 	price,
					status: status,
					floor: 	floor,
					area: 	area,
					rooms: 	rooms
					
				};
				
				i++;
				
			}).get();
			console.log('Перезапуск: ');
			console.log(filterObjectList);
			return filterObjectList;
		}
			//собираем data квартир на поэтажном плане
		function getFloorList() {
			
			floorList = $(".legato-class-80").map(function(){
			    return $(this).data('ident');
			}).get();
			
			//console.log(floorList);
		}
			console.log('Объект');
			getMainObjectList();
			getFilterObjectList();
			getFloorList();
			
			 //ищем совпадения отфильтрованных квартир на поэтажном плане
		function searchInObjectList() {

			$.each(floorList, function(index, value) {
					for(var key in mainObjectList) {
						if('id-appart-'+ value == mainObjectList[key].id) {
							//console.log(key + ': id-appart-'+ value + '; ' + mainObjectList[key].id);
							$(".legato-class-80").addClass('my-ultra-class');
							$("#polygon-" + value).attr('data-status', mainObjectList[key].status);
							
						}
					}
				});
			}
		
			searchInObjectList();
			
			//модальное окно поэтажный план, присваиваем значение объекту
		$('.legato-class-80').click(function() {
				
				var ID = $(this).data('ident');
					for(var key in mainObjectList) {
						if('id-appart-'+ ID == mainObjectList[key].id) {
							//console.log(key + ': id-appart-'+ value + '; ' + mainObjectList[key].id);
							$('.number-popup').html('№' + mainObjectList[key].number);
							$('.price-popup').html(mainObjectList[key].price);
							$('.status-popup').html(mainObjectList[key].status);
							$('.floor-popup').html(mainObjectList[key].floor);
							$('.area-popup').html(mainObjectList[key].area);
							$('.rooms-popup').html(mainObjectList[key].rooms);
						}
					}

			$.magnificPopup.open({
				items: {
					src: "#popup-modal-window"
				}
			});
			
			$('.burger-maks').addClass('active-maks');
		});	
		
		
			//модальное окно отфильтрованные объекты, присваиваем значение объекту
			function bugAjax() {
		$('.appart').click(function() {
					
				var filterObjectList = getFilterObjectList();
				
					console.log(filterObjectList);
					
				var ID = $(this).attr('id');
					for(var key in filterObjectList) {
						if(ID == filterObjectList[key].id) {
							//console.log(key + ': id-appart-'+ value + '; ' + mainObjectList[key].id);
							$('.number-popup').html('№' + filterObjectList[key].number);
							$('.price-popup').html(filterObjectList[key].price);
							$('.status-popup').html(filterObjectList[key].status);
							$('.floor-popup').html(filterObjectList[key].floor);
							$('.area-popup').html(filterObjectList[key].area);
							$('.rooms-popup').html(filterObjectList[key].rooms);
						}
					}

			$.magnificPopup.open({
				items: {
					src: "#popup-modal-window"
				}
			});
			
			$('.burger-maks').addClass('active-maks');
		});	
		
	}
	
		bugAjax();
				// установим обработчик события mousemove, элементу с классом legato-class-80
		$('.legato-class-80').mousemove(
			function(pos){
			  ID_polygon = $(this).data('ident');
				
			  $.each(mainObjectList, function(index, value) {

				if(value.id == 'id-appart-' + ID_polygon) {
					setTimeout(function() {
					//console.log('value: ' + value);
					//console.log('ID_polygon: id-appart-' + ID_polygon);
					//console.log(pos.pageX + pos.pageY);
					var showStatus = $('#polygon-' + ID_polygon).data('status');
					console.log(showStatus);
      				$("#show-status-object").html(showStatus).css('left',(pos.pageX+10)+'px').css('top',(pos.pageY+10)+'px');
					$("#show-status-object").show();
					
					}, 200);
				}	
			});
		}).mouseleave(function() {
			$("#show-status-object").hide();
		});
		
		

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
            }, fadeSpeed);
        }).done(function() {
        	
	        	setTimeout(function() {
				searchInObjectList();
				getFilterObjectList();
				bugAjax();
				
				}, 2000);
        	
        
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
        e.preventDefault();
        $(ajaxFormSelector).trigger('reset');
        $('input[name=sortby]').val('pagetitle');
        $('input[name=sortdir]').val('asc');
        setTimeout(function() {
            $('.room-filter-btn').toggleClass('button-sort-asc');
        }, fadeSpeed);
        ajaxMainFunction();
        ajaxCount();
    })

    $(''+ajaxFormSelector+' .change_filter').change(function() {
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