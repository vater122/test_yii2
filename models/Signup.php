<?php
namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass'=>'app\models\User'],//только уникальный email. Используется ТА модель, которая
            ['password', 'string', 'min'=>2, 'max'=>10]       //содержит таблицу, к которой нужно применить правило. Модель
        ];                                         //User и таблица user соединяются автоматом, т.к. имеют идентичные имена
    }

    public function signup()
    {
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);

        return $user->save(); //возвращает false/true
    }

}