<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php if($name){ ?>
    <p>Имя - <?= $name; ?> и емаил - <?= $email; ?></p>
<?php } ?>

<?php $f = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?php echo $f->field($form, 'name'); ?>
<?php echo $f->field($form, 'email'); ?>
<?=$f->field($form, 'file')->fileInput() ?>

<?php echo Html::submitButton('Go'); ?>

<?php ActiveForm::end(); ?>

