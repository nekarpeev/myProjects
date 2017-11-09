<?php

class Category {
    const DEFAULT_LIMIT = 6;

    public static function getCategory() {
        include(ROOT . '/config/connect.php');
        if($db == false) {
    echo 'Baaaad';
}
else{
    $result = $db->query('SELECT id, name, sort_order FROM `article_category` ORDER BY sort_order ASC');

    while($row = $result->fetch()) {
        static $i = 0;
        $categoryList[$i]['id'] = $row['id'];
        $categoryList[$i]['name'] = $row['name'];
        $categoryList[$i]['sort_order'] = $row['sort_order'];

        $i++;
    }
    return $categoryList;
}
    }


    public static function getProductListByCategory($idCategory, $page = 1) {
        include(ROOT . '/config/connect.php');
        if($db == false) {
    echo 'Baaaad';
}
else{
    $result = $db->prepare('SELECT * FROM `articles` WHERE id_category = ?');
    $result -> execute([$idCategory]);
    while($row = $result->fetch()) {
        static $i = 0;
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

}

