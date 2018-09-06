<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Accessevent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accessevent-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_id')->dropDownList(
            \yii\helpers\BaseArrayHelper::map(\app\models\Event::find()->all(),'id','name')
    ) ?>
    <?= $form->field($model, 'user_id')->dropDownList(
        \yii\helpers\BaseArrayHelper::map(\app\models\User::find()->all(),'id','username')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
