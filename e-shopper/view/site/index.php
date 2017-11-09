
<?php 
include_once(ROOT . '/view/layouts/header.php');
?>

        <section>
    <div class="container">
        <div class="row">
<!--            Загружаем категории-->
            <?php include_once(ROOT . '/view/catalog/category.php');?>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    
                   <?php foreach ($productLast as $product):?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        
                                        <div class="productinfo text-center">
                                            <a href="/e-shopper/product/<?php echo $product['id'];?>"> 
                                                <img src="template/images/home/product1.jpg" alt="" />
                                            </a>
                                            <h2><?php echo $product['price'];?></h2>
                                            <p>
                                                <a href="/e-shopper/product/<?php echo $product['id'];?>"> <?php echo $product['title']; ?></a>
                                            </p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if ($product['is_new']): ?>
                                        <img src="template/images/home/new.png" class="new" alt="" />
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>

                </div><!--features_items-->

<!--                Подключение рекомендованных товаров-->
                     <?php 
         include_once ROOT . '/view/catalog/recommended.php';
        ?>

            </div>
        </div>
    </div>
</section>
        <?php 
         include_once ROOT . '/view/layouts/footer.php';
        ?>