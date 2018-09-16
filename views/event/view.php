<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Event;
use app\objects\EventAccessChecker;

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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif;?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'start_at',
            'end_at',
            'create_at',
            'update_at',
        ],
    ]) ?>

</div>
