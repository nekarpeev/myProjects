<?php 
// получаем запрос 'hatsIndex' и направляем его на контроллер 'hatsControlelr' и 
// вызываем в нем экшн(метод)'actionIndex' !!!'hatsIndex' => 'hats/index'!!!

//ищем в строке запроса по шаблону с помощью функции preg_match
return array(
    'product/([0-9]+)' => 'product/view/$1',
//            'product/([a-z]+)' => 'product/$1',
            'product' => 'product/list',
            'catalog' => 'catalog/view',
            'category/([0-9]+)' => 'catalog/category/$1',
            'e-shopper' => '/site/index'
            
    ); 
    
    
















 ?>