<?php
include_once(ROOT .'/models/Product.php');
include_once(ROOT .'/models/Category.php');

class ProductController {
       
    public function actionView($idProduct) {
        
        $categoryList = [];
        $categoryList = Category::getCategory();
        
        $productItem = [];
        $productItem = Product::getProductById($idProduct);
 
       include_once(ROOT . '/view/product/view.php');
       
        die;
    }
    
    
    public function actionList() {
        
       echo 'Просмотр списка товаров';
         
        $productList = array();
        $productList = Product::getProductList();
        echo '<pre>';
//        $_REQUEST['title'] = $productList['title'];
        print_r($productList);
        echo '<pre>';
        echo 'privet';
        
        return true;
    }   
   
   
}

