<?php
namespace app\models;

use Yii;
use yii\base\Model;

class MyForm extends Model
{
    public $name;
    public $email;
    public $file;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name and email are both required
            [['name', 'email'], 'required', 'message' => 'Не заполнено поле!'],
            // поле email типа email
            ['email', 'email', 'message' => 'Некорректный e-mail!'],
            [['file'], 'file', 'extensions' => 'jpg, png']
        ];
    }
}