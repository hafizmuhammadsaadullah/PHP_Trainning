<?php
use yii\helpers\Html;
?>
<?php $form=\yii\widgets\ActiveForm::begin();?>
    <?= $form->field($model,'name')->label('Your Name')?>
    <?= $form->field($model,'email')->label('Your Email')?>
    <div class="form-group">
        <?= Html::submitButton('Login',['class'=>'btn btn-orimary']) ?>
    </div>
<?php $form=\yii\widgets\ActiveForm::end();?>
