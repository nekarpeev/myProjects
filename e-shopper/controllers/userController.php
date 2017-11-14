<?php

class UserController
{

    /**
     *
     */
    public function actionRegister()
    {
        $reg_name = false;
        $reg_email = false;
        $reg_password = false;
        $result = false;

        if(isset($_POST['reg_submit']))
        {
            // Если форма отправлена
            // Получаем данные из формы
            $reg_name = $_POST['reg_name'];
            $reg_email = $_POST['reg_email'];
            $reg_password = $_POST['reg_password'];
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = User::register($name, $email, $password);
            }
        }
        include_once(ROOT . '/view/site/register.php');


        die();
    }






}