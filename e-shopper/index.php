

    <?php 
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);
error_reporting(E_ALL);
//Создаем именованную константу и присваиваем ей значение (путь)
	define('ROOT', dirname(__FILE__));			
		 //подключаем константу и плюс файл
                //include_once('conf.php');
		include_once(ROOT . '/config/connect.php');
		include_once(ROOT . '/Router.php');
                 
                //Получае запрос, который ввел пользователь
$rout1 = new Router;
$rout1->run();

?>





	 
	
        
	 
         
	