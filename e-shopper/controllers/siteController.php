<?php
include_once(ROOT .'/models/Category.php');
include_once(ROOT .'/models/Product.php');
class SiteController {
    
    public function actionIndex() {
        
        $categoryList = [];
        $categoryList = Category::getCategory();
        
        $productLast = [];
        $productLast = Product::getProductLast();
        
        $productRec = [];
        $productRec = Product::getProductRec();
        
        
        
        include_once(ROOT . '/view/site/index.php');
   
        die();
    }
    
    
    
}
