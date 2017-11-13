<?php

    class Product {
        const DEFAULT_LIMIT = 6;
        //получение списка рекомендуемых товаров (6)
        public static function getProductLast($count = self::DEFAULT_LIMIT) {
            
           include(ROOT . '/config/connect.php');
if($db == false) {
    echo 'Baaaad';
}
else{
    $productList = array();
    $i = 0;
    $result = $db->query('SELECT id, category, title, text, price, is_new, is_recommended, status  FROM `articles` ORDER BY id DESC LIMIT ' . $count);
    while($row = $result->fetch()) {
    $productList[$i]['id'] = $row['id'];
    $productList[$i]['category'] = $row['category'];
    $productList[$i]['title'] = $row['title'];
    $productList[$i]['text'] = $row['text'];
    $productList[$i]['price'] = $row['price'];
    $productList[$i]['is_new'] = $row['is_new'];
    $productList[$i]['is_recommended'] = $row['is_recommended'];
    $productList[$i]['status'] = $row['status'];
        $i++;
    }
    return $productList;  
}
        }
          //получение списка рекомендуемых товаров (6)
        public static function getProductRec($count = self::DEFAULT_LIMIT) {
            
           include(ROOT . '/config/connect.php');
if($db == false) {
    echo 'Baaaad';
}
else{
    $productList = array();
    $i = 0;
    $result = $db->query('SELECT * FROM `articles` WHERE is_recommended = 1 ORDER BY id DESC LIMIT ' . $count);
    while($row = $result->fetch()) {
    $productRec[$i]['id'] = $row['id'];
    $productRec[$i]['category'] = $row['category'];
    $productRec[$i]['title'] = $row['title'];
    $productRec[$i]['text'] = $row['text'];
    $productRec[$i]['price'] = $row['price'];
    $productRec[$i]['is_new'] = $row['is_new'];
    $productRec[$i]['is_recommended'] = $row['is_recommended'];
    $productRec[$i]['status'] = $row['status'];
        $i++;
    }
    return $productRec;  
}
        }

        public static function getProductList() {
            
           include(ROOT . '/config/connect.php');
if($db == false) {
    echo 'Baaaad';
}
else{
    set_time_limit(300);
    $productList = array();
    $i = 0;
    $result = $db->query('SELECT id, category, title, text, price, is_new, is_recommended, status FROM `articles` WHERE status = 1 ORDER BY id DESC');
    while($row = $result->fetch()) {
    $productList[$i]['id'] = $row['id'];
    $productList[$i]['category'] = $row['category'];
    $productList[$i]['title'] = $row['title'];
    $productList[$i]['text'] = $row['text'];
    $productList[$i]['price'] = $row['price'];
    $productList[$i]['is_new'] = $row['is_new'];
    $productList[$i]['is_recommended'] = $row['is_recommended'];
    $productList[$i]['status'] = $row['status'];
        $i++;
    }
    return $productList;  
}
        }
       
        public static function getProductByCategory($parameters) {
           include(ROOT . '/config/connect.php');
if($db == false) {
    echo 'Baaaad';
}
else{
    $productCat = array();
    $result = $db->prepare('SELECT id, category, title, text, price FROM `articles` WHERE category = ?');
    $result->execute([$parameters]);
    //$productCat = $result -> fetch();
    $i = 0;
    while($row = $result->fetch()) {
    $productCat[$i]['id'] = $row['id'];
    $productCat[$i]['category'] = $row['category'];
    $productCat[$i]['title'] = $row['title'];
    $productCat[$i]['text'] = $row['text'];
    $productCat[$i]['price'] = $row['price'];
    $i++;
    }
    return $productCat;
}     
        }   
        public static function getProductById($idProduct) {
            include(ROOT . '/config/connect.php');
            if($db == false) {
    echo 'Baaaad';
}
else{

    $productId = array();
    $result = $db->prepare('SELECT * FROM `articles` WHERE id = ?');
    $result -> execute([$idProduct]);
    $productId = $result -> fetch();

    //вариант Длинный!
    /*while($row = $result->fetch()) {
        $productId['id'] = $row['id'];
        $productId['category'] = $row['category'];
        $productId['title'] = $row['title'];
        $productId['text'] = $row['text'];
        $productId['price'] = $row['price']; 
    }
       */
    return $productId;
    
   
        }
    }
 }
   
