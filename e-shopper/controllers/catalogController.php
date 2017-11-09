<?php
    include_once(ROOT . '/models/Category.php');
    include_once(ROOT . '/models/Product.php');

    class CatalogController
    {

        public function actionView()
        {

            $categoryList = [];
            $categoryList = Category::getCategory();

            $productList = [];
            $productList = Product::getProductList();

            include_once(ROOT . '/view/catalog/view.php');

            die();
        }

        //get products by category
        public function actionCategory($idCategory, $page = 1)
        {
            echo 'page: ' . $page;

            $categoryList = [];
            $categoryList = Category::getCategory();

            $productList = [];
            $productList = Category::getProductListByCategory($idCategory, $page);

            include_once(ROOT . '/view/catalog/product_cat.php');

            die();
        }


    }
