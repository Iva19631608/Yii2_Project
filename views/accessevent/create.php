<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Accessevent */

$this->title = 'Create Accessevent';
$this->params['breadcrumbs'][] = ['label' => 'Accessevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessevent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
