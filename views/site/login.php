<h1>Логин</h1>

<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<?php echo $form->field($login_model, 'email')->textInput(); ?>

<?php echo $form->field($login_model, 'password')->passwordInput(); ?>

<div>
    <button class="btn btn-succsess" type="submit">LogIn</button>
</div>

<?php ActiveForm::end(); ?>
