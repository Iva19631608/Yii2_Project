<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\objects\viewModels\EventView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $viewModel EventView */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($viewModel->isAuthor($model)): ?>
    <p>
        <?php if (strtotime($model->start_at) > time()) :?>
             <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif;?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif;?>
    <?php // if ($this->beginCache('view_event', ['duration' => 60])):?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'start_at',
            'end_at',
        ],
    ]) ?>
    <?php //$this->endCache();?>
    <?php //endif;?>
</div>
