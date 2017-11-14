<?php require_once (ROOT . '/view/layouts/header.php'); ?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="" method="post">
                        <?//=$reg_name; ?>
                        <?//=$reg_email; ?>
                        <input name="reg_name" type="text" placeholder="Name" value="<?=$reg_name; ?>"/>
                        <input name="reg_email" type="email" placeholder="Email Address" value="<?=$reg_email; ?>" />
                        <span>
								<input type="checkbox" class="checkbox">
								Запомнить меня
							</span>
                        <input name="submit" type="submit" class="btn btn-default">
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>

                    <form action="" method="post">
                        <?=$reg_name; ?>
                        <?=$reg_email; ?>
                        <?=$reg_password; ?>
                        <input name="reg_name" type="text" placeholder="Name" value="<?=$reg_name; ?>"/>
                        <input name="reg_email" type="email" placeholder="Email Address" value="<?=$reg_email; ?>"/>
                        <input name="reg_password" type="password" placeholder="Password" value="<?=$reg_password; ?>"/>
                        <input name="reg_submit" type="submit" class="btn btn-default">
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->

    <!--Footer-->
<?php require_once (ROOT . '/view/layouts/footer.php'); ?>