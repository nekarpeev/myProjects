<?php
include_once(ROOT .'/models/Category.php');
include_once(ROOT .'/models/Product.php');

class CatalogController {
    
    public function actionView() {
        
        $categoryList = [];
        $categoryList = Category::getCategory();
        
        $productList = [];
        $productList = Product::getProductList();
                
        include_once(ROOT . '/view/catalog/view.php');
       
        die();
    }
    
     public function actionCategory($idCategory) {
        
         
        $categoryList = [];
        $categoryList = Category::getCategory();
        
        $productList = [];
        $productList = Category::getCategoryListById($idCategory);
        
        include_once(ROOT . '/view/catalog/product_cat.php');
       
        die();
    }
    
    
}
