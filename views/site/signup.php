<h1>Регистрация</h1>

<?php
use \yii\widgets\ActiveForm;
?>

<?php
   $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]);
?>

<?php echo $form->field($model, 'email')->textInput(['autofocus'=>true]); ?>

<?php echo $form->field($model, 'password')->passwordInput(); ?>

<div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

<?php
   ActiveForm::end();
?>