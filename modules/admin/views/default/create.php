<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-6">
        <?php echo $form->field($model, 'title')->textInput(); ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->field($model, 'description')->textInput(); ?>
    </div>
    <div class="col-md-12">
        <?php echo Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>
</div>


<?php ActiveForm::end(); ?>
