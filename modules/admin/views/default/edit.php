<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-6">
        <?php echo $form->field($one, 'title')->textInput(); ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->field($one, 'description')->textInput(); ?>
    </div>
    <div class="col-md-12">
        <?php echo Html::submitButton('Изменить', ['class' => 'btn btn-success']) ?>
    </div>
</div>


<?php ActiveForm::end(); ?>
