<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Event;
use app\objects\EventAccessChecker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
$isAllowedToWriteCallback = function (Event $event) {
    return (new EventAccessChecker())->isAllowedToWrite($event);
};
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'start_at',
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            [
                'attribute' => 'end_at',
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            [
                'label' => 'Автор',
                'format' => 'raw',
                'value' => function (Event $model) use ($viewModel) {
                    return $viewModel->getUserLink($model);
                }
            ],
            //'author.username',
            //'create_at',
            //'update_at',
            [
                'format' => 'raw',
                'value' => function (Event $model) {
                    return Html::a('JSON', ['event/json', 'id' => $model->id]);
                }
            ],
            [
                'class' => \yii\grid\ActionColumn::class,
                'visibleButtons' => [
                    'view' => function (\app\models\Event $model) {
                        return (new EventAccessChecker())->isAllowedToRead($model);
                    },
                    'update' => $isAllowedToWriteCallback,
                    'delete' => $isAllowedToWriteCallback,
                ],
            ],
        ],
    ]); ?>
</div>
