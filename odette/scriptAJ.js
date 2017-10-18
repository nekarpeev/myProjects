$(function() {
	
			//range slider
	
        $("#price-filter").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 100000,
            max: 25000000,
            from: 5000000,
            to: 24000000,
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
	            max: 220,
	            from: 50,
	            to: 200,
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
		
		
			
			var ID_polygon,
				objectList,
			 	floorList,
				searchResult;
				
			//собираем id сгенерированных квартир на странице
		function getObjectList() {
		
			objectList = $(".appart").map(function(){
			    return $(this).attr("id");
			}).get();

		}
			//собираем data квартир на поэтажном плане
		function getFloorList() {
			
			floorList = $(".legato-class-80").map(function(){
			    return $(this).data('ident');
			}).get();
			
			//console.log(floorList);
		}
			
			getObjectList();
			getFloorList();
			
			 //ищем совпадения отфильтрованных квартир на поэтажном плане
		function searchInObjectList() {
			//console.log('floorList: ' + floorList);
			//console.log('objectList: ' + objectList);
			
			$.each(floorList, function(index, value) {
				searchResult = $.inArray('id-appart-'+value, objectList);
				
				console.log(index + ': ' + searchResult);
			});
			
		}
		
			searchInObjectList();
			
				// установим обработчик события mouseover, элементу с классом legato-class-80
		$('.legato-class-80').mouseover(function(){
			
			  ID_polygon = $(this).data('ident');
			  
			  $.each(objectList, function(index, value) {
				//console.log('индекс: ' + index +'; значение: ' + value);
				//console.log(objectListId);
					
				if(value == 'id-appart-' + ID_polygon) {
					setTimeout(function() {
					console.log('value: ' + value);
					console.log('ID_polygon: id-appart-' + ID_polygon);
					$('#polygon-' + ID_polygon).addClass('my-super-class');
					$(".legato-class-80").not('#polygon-' + ID_polygon).removeClass('my-super-class');
					}, 1000);
				}
			  });
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
				getObjectList();
				searchInObjectList();
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
            $('[data-sort-by]').data('sort-dir', 'asc').toggleClass('button-sort-asc').text(sortUpText);
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