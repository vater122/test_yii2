<?php

namespace app\models;

use yii\base\Model;

class Login extends Model
{
   public $email;
   public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'validatePassword'] //собственная функция для валидации пароля
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {  //если нет ошибок валидации

            $user = $this->getUser(); // получаем пользователя для дальнейшего сравнения пароля

            if (!$user || (!$user->validatePassword($this->password))) {
                //если мы НЕ нашли в базе такого пользователя
                //или введенный пароль и пароль в базе НЕ равны, ТО
                $this->addError($attribute, 'Пользователь или пароль введены неверно!');
                //добавляем новую ошибку для атрибута password о том что пароль или пользователь введены неверно
            }
        }
    }

    public  function getUser()
    {
        return User::findOne(['email'=>$this->email]); // а получаем его мы по email
    }
}